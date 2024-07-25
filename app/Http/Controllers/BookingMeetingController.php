<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Google\Client;
use App\Models\Employee;
use App\Models\MeetingBooking;
use App\Models\MeetingExternalGuest;
use App\Models\MeetingInternalGuest;
use App\Models\MeetingRoom;
use Illuminate\Support\Facades\Mail;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Mail\BookingRoom\BookingUpdated;
use App\Mail\BookingRoom\BookingSubmitted;
use App\Mail\BookingRoom\BookingCancelled;
use App\Mail\BookingRoom\InternalGuestNotification;
use App\Mail\BookingRoom\BookingConfirmation;
use App\Mail\BookingRoom\InternalGuestNotificationUpdate;
use App\Mail\BookingRoom\ExternalGuestNotification;
use App\Mail\BookingRoom\ExternalGuestNotificationUpdate;


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
            $currentYear = date('Y'); // Get the current year
            $currentMonth = date('m'); // Get the current month

            // Fetch the maximum serial number for the current month and year
            $lastRequest = MeetingBooking::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->orderBy('booking_number', 'desc')
                ->first();

            $lastSerialNumber = 0;
            if ($lastRequest) {
                // Extract the serial number part from the last request number
                if (preg_match('/\d{3}(?=-\d{2}-' . $currentYear . '$)/', $lastRequest->br_number, $matches)) {
                    $lastSerialNumber = intval($matches[0]);
                }
            }

            // Increment the serial number
            $newSerialNumber = $lastSerialNumber + 1;

            // Format the new request number
            $requestNumber = sprintf('NRS-BR-%03d-%02d-%d', $newSerialNumber, $currentMonth, $currentYear);
            $data['booking_number'] = $requestNumber;
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

            // Initialize the Google Client
            $client = new Client();
            $client->setAuthConfig(config_path('credentials/client_secret.json'));
            $client->addScope(Calendar::CALENDAR);
            $client->setAccessType('offline');

            // Check if token is available or needs to be refreshed
            $googleToken = auth()->user()->googleToken;
            if ($googleToken) {
                $token = json_decode($googleToken->access_token, true);
                $client->setAccessToken($token);

                if ($client->isAccessTokenExpired()) {
                    $refreshToken = $googleToken->refresh_token;
                    $client->fetchAccessTokenWithRefreshToken($refreshToken);
                    $newAccessToken = $client->getAccessToken();
                    $googleToken->update([
                        'access_token' => json_encode($newAccessToken),
                        'expires_at' => Carbon::now()->addSeconds($newAccessToken['expires_in']),
                    ]);
                }
            } else {
                return redirect()->route('google.calendar.auth', ['room_id' => $roomId]);
            }

            // Create Google Calendar service
            $service = new Calendar($client);

            $event = new Event([
                'summary' => 'Meeting: ' . $data['desc'] ,
                'description' => 'Room: ' . $room->room_name,
                'start' => [
                    'dateTime' => $startDate,
                    'timeZone' => 'Asia/Jakarta',
                ],
                'end' => [
                    'dateTime' => $endDate,
                    'timeZone' => 'Asia/Jakarta',
                ],
                'attendees' => array_merge(
                    array_map(fn($guestId) => ['email' => Employee::find($guestId)->email], $guests),
                    array_map(fn($email) => ['email' => $email], $externalGuests)
                ),
            ]);

            $calendarId = 'primary'; // Use 'primary' or specify the calendar ID
             $createdEvent = $service->events->insert($calendarId, $event);

            // Simpan google_event_id
            $booking->update(['google_event_id' => $createdEvent->token_id]);

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
                Mail::to($guestUser->email)->send(new InternalGuestNotificationUpdate($booking, $guestUser));
            }

            // Handle external guests
            if ($request->has('additional_emails')) {
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
                    Mail::to($email)->send(new ExternalGuestNotificationUpdate($booking, $email));
                }
            } else {
                $externalGuests = [];
            }

            // Send confirmation email to the user who booked
            $guestUsers = Employee::whereIn('employee_id', $guests)->get();
            $user = Employee::find($booking->employee_id);
            $room = MeetingRoom::find($booking->room_id);
            $booking = $booking->booking_number;

            $data['name'] = $user->full_name;
            $data['email'] = $user->email;
            $data['phone'] = $user->phone;
            $data['room_name'] = $room->room_name;
            $data['booking_number'] = $booking;

            Mail::to($user->email)->send(new BookingUpdated($data, $guestUsers, $externalGuests));

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

    public function sendConfirmationEmails()
    {
        $oneHourLater = Carbon::now()->addHour();
        $bookings = MeetingBooking::where('start', '<=', $oneHourLater)
                            ->where('start', '>', Carbon::now())
                            ->where('confirmation_sent', false)
                            ->get();

        foreach ($bookings as $booking) {
            $user = Employee::find($booking->employee_id);
            if ($user) {
                Mail::to($user->email)->send(new BookingConfirmation($booking));

                // Update booking to mark that the email has been sent
                $booking->confirmation_sent = true;
                $booking->save();
            }
        }
    }
}
