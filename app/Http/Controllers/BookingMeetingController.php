<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Mail\BookingSubmitted;
use App\Mail\BookingUpdated;
use App\Mail\ExternalGuestNotification;
use App\Mail\ExternalGuestNotificationUpdate;
use App\Mail\InternalGuestNotification;
use App\Mail\InternalGuestNotificationUpdate;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\MeetingBooking;
use App\Models\MeetingExternalGuest;
use App\Models\MeetingInternalGuest;
use App\Models\MeetingRoom;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class BookingMeetingController extends Controller
{
    public function index()
    {
        $rooms = MeetingRoom::all();
        return view('bookingroom.index', compact('rooms'));
    }

    public function create(MeetingRoom $room)
    {
        $users = Employee::all();
        return view('bookingroom.create', compact('room', 'users'));
    }

    public function store(BookingRequest $request)
    {
        $data = $request->validated();
        $startDate = Carbon::parse($data['start_time']);
        $endDate = Carbon::parse($data['end_time']);
        $roomId = $data['room_id'];

        $today = Carbon::today();
        $maxDate = $today->copy()->addWeeks(1);

        // Check if the start date is within one week from today
        if ($startDate < $today || $startDate > $maxDate) {
            return redirect()->back()->with('error', 'Failed booking. Booking date must be within one week from today.');
        }

        // Check if the end date is within one week from today
        if ($endDate < $today || $endDate > $maxDate) {
            return redirect()->back()->with('error', 'Failed booking. Booking date must be within one week from today.');
        }

        $availableRooms = MeetingRoom::where('room_id', $roomId)
        ->whereNotIn('room_id', function ($query) use ($startDate, $endDate) {
            $query->select('room_id')
                ->from('meeting_bookings')
                ->where(function ($query) use ($startDate, $endDate) {
                    $query->where(function ($query) use ($startDate, $endDate) {
                        $query->where('start_time', '<', $endDate)
                            ->where('end_time', '>', $startDate);
                    });
                });
        })
        ->exists();

        if (!$availableRooms) {
            return redirect()->back()->with('error', 'Failed booking. Room at that time already booked, choose another room or time!');
        } else {
            $data['employee_id'] = auth()->id();
            $booking = MeetingBooking::create($data);

            // Handle internal guests
            $guests = $request->input('internalGuest', []);
            foreach ($guests as $guestId) {
                MeetingInternalGuest::create([
                    'employee_id' => $guestId,
                    'booking_id' => $booking->booking_id,
                ]);
                // Find guest user and send notification email
                $guestUser = Employee::find($guestId);
                Mail::to($guestUser->email)->send(new InternalGuestNotification($booking, $guestUser));
            }

            // Handle external guests if provided
            if ($request->has('additional_emails')) {
                $validatedData = $request->validate([
                    'additional_emails.*' => 'email', // Validasi setiap email
                ]);

                $externalEmails = $validatedData['additional_emails'];
                $externalGuests = [];

                foreach ($externalEmails as $email) {
                    MeetingExternalguest::create([
                        'email' => $email,
                        'booking_id' => $booking->booking_id,
                    ]);
                    $externalGuests[] = $email;
                    Mail::to($email)->send(new ExternalGuestNotification($booking, $email));
                }
            } else {
                $externalGuests = [];
            }

            // Send confirmation email to the user who booked
            $guestUsers = Employee::whereIn('employee_id', $guests)->get();
            $user = Employee::find($data['employee_id']);
            $room = MeetingRoom::find($data['room_id']);

            $data['name'] = $user->full_name;
            $data['email'] = $user->email;
            $data['telephone'] = $user->phone;
            $data['room_name'] = $room->room_name;

            Mail::to($user->email)->send(new BookingSubmitted($data, $guestUsers, $externalGuests));

            return redirect()->back()->with('status', 'The room has been successfully booked!');
        }
    }

    public function edit(MeetingBooking $booking)
    {

        $users = Employee::all();
        return view('bookingroom.edit', compact( 'booking', 'users'));
    }

    public function update(BookingRequest $request, MeetingBooking $booking)
    {
        $data = $request->validated();
        $startDate = Carbon::parse($data['start_time']);
        $endDate = Carbon::parse($data['end_time']);
        $roomId = $data['room_id'];

        $today = Carbon::today();
        $maxDate = $today->copy()->addWeeks(1);

        // Check if the start date is within one week from today
        if ($startDate < $today || $startDate > $maxDate) {
            return redirect()->back()->with('error', 'Failed booking. Booking date must be within one week from today.');
        }

        // Check if the end date is within one week from today
        if ($endDate < $today || $endDate > $maxDate) {
            return redirect()->back()->with('error', 'Failed booking. Booking date must be within one week from today.');
        }

        // Check if the room is available
        $availableRooms = MeetingRoom::where('room_id', $roomId)
            ->whereNotIn('room_id', function ($query) use ($startDate, $endDate, $booking) {
                $query->select('room_id')
                    ->from('meeting_bookings')
                    ->where('room_id', '<>', $booking->booking_id) // Exclude current booking
                    ->where(function ($query) use ($startDate, $endDate) {
                        $query->whereBetween('start_time', [$startDate, $endDate])
                            ->orWhereBetween('end_time', [$startDate, $endDate])
                            ->orWhere(function ($query) use ($startDate, $endDate) {
                                $query->where('start_time', '<=', $startDate)
                                    ->where('end_time', '>=', $endDate);
                            });
                    });
            })
            ->exists();

        if (!$availableRooms) {
            return redirect()->back()->with('error', 'Failed booking. Room at that time already booked, choose another room or time!');
        } else {
            $booking->update($data);

            // Handle internal guests
            $guests = $request->input('guests', []);
            $booking->internalGuest()->delete();

            foreach ($guests as $guestId) {
                MeetingInternalGuest::create([
                    'employee_id' => $guestId,
                    'booking_id' => $booking->booking_id,
                ]);
                $guestUser = Employee::find($guestId);
                // Mail::to($guestUser->email)->send(new InternalGuestNotificationUpdate($booking, $guestUser));
            }

            // Handle external guests
            $validatedData = $request->validate([
                'additional_emails.*' => 'email', // Validate each email
            ]);

            $externalEmails = $validatedData['additional_emails'];
            $externalGuests = [];

            // Delete old external guests and re-add the new ones
            $booking->externalGuest()->delete();

            foreach ($externalEmails as $email) {
                MeetingExternalGuest::create([
                    'email' => $email,
                    'booking_id' => $booking->booking_id,
                ]);
                $externalGuests[] = $email;
                // Mail::to($email)->send(new ExternalGuestNotificationUpdate($booking, $email));
            }

            // Send confirmation email to the user who booked
            $guestUsers = Employee::whereIn('employee_id', $guests)->get();
            $user = Employee::find($booking->employee_id);
            $room = MeetingRoom::find($booking->room_id);

            $data['name'] = $user->full_name;
            $data['email'] = $user->email;
            $data['telephone'] = $user->telephone;
            $data['room_name'] = $room->room_name;

            // Mail::to($user->email)->send(new BookingUpdated($data, $guestUsers, $externalGuests));

            return redirect()->back()->with('status', 'The booking has been successfully updated!');
        }
    }

    public function destroy(MeetingBooking $booking)
    {
        $this->authorize('owner', $booking);
        $booking->delete();

        return redirect()->route('bookingroom.index')->with('status', 'Your booking has been successfully deleted!');
    }

    public function list()
    {
        $bookings = MeetingBooking::all();
        return view('bookingroom.list', compact('bookings'));
    }
}
