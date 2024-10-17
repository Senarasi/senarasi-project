<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Google\Client;
use App\Models\Room;
use App\Models\Employee;
use App\Models\Guest;
use App\Models\Booking;
use Google\Service\Calendar;
use Illuminate\Http\Request;
use App\Models\Externalguest;
use App\Models\HybridMeeting;
use Google\Service\Calendar\Event;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookingRequest;
use App\Mail\BookingRoom\BookingUpdated;
use App\Mail\BookingRoom\BookingCancelled;
use App\Mail\BookingRoom\BookingSubmitted;
use App\Mail\BookingRoom\GuestNotification;
use Google\Service\Calendar\ConferenceData;
use App\Mail\BookingRoom\BookingConfirmation;
use App\Mail\BookingRoom\GuestNotificationUpdate;
use App\Mail\BookingRoom\ExternalGuestNotification;
use App\Mail\BookingRoom\GuestNotificationCancelled;
use Google\Service\Calendar\CreateConferenceRequest;
use App\Mail\BookingRoom\ExternalGuestNotificationUpdate;
use App\Mail\BookingRoom\ExternalGuestNotificationCancelled;
use GuzzleHttp\Client as GuzzleClient;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('bookingroom.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Room $room)
    {
        $users = Employee::all();
        return view('bookingroom.create', compact('room', 'users'));
    }

    public function store(BookingRequest $request)
    {
        $data = $request->validated();
        $startDate = Carbon::parse($data['start']);
        $endDate = Carbon::parse($data['end']);
        $roomId = $data['room_id'];

        $user = auth()->user();

        if ($user->role !== 'admin') {
            $today = Carbon::today();
            $maxDate = $today->copy()->addWeeks(1);

            // Check if the start and end dates are within one week from today
            if ($startDate < $today || $startDate > $maxDate || $endDate < $today || $endDate > $maxDate) {
                return redirect()->back()->with('error', 'Failed booking. Booking date must be within one week from today.');
            }
        }

        $availableRooms = Room::where('id', $roomId)
            ->whereNotIn('id', function ($query) use ($startDate, $endDate) {
                $query->select('room_id')
                    ->from('bookings')
                    ->where(function ($query) use ($startDate, $endDate) {
                        $query->where(function ($query) use ($startDate, $endDate) {
                            $query->where('start', '<', $endDate)
                                ->where('end', '>', $startDate);
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
            $lastRequest = Booking::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->orderBy('br_number', 'desc')
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
            $data['br_number'] = $requestNumber;

            $booking = Booking::create($data);

            // Handle internal guests
            $guests = $request->input('guests', []);
            foreach ($guests as $guestId) {
                Guest::create([
                    'employee_id' => $guestId,
                    'booking_id' => $booking->id,
                ]);
            }

            // Handle external guests if provided
            if ($request->has('additional_emails')) {
                $validatedData = $request->validate([
                    'additional_emails.*' => 'email', // Validasi setiap email
                ]);

                $externalEmails = $validatedData['additional_emails'];
                $externalGuests = [];

                foreach ($externalEmails as $email) {
                    Externalguest::create([
                        'email' => $email,
                        'booking_id' => $booking->id,
                    ]);
                    $externalGuests[] = $email;
                }
            } else {
                $externalGuests = [];
            }

            // Initialize the Google Client
            $client = new Client();
            $client->setAuthConfig(config_path('credentials/client_secret.json'));
            $client->addScope(Calendar::CALENDAR);
            $client->setAccessType('offline');

            // Check if token is available or needs to be refreshed
            $googleToken = auth()->user()->googleToken;
            // if ($googleToken) {
            //     $token = json_decode($googleToken->access_token, true);
            //     $client->setAccessToken($token);

            //     if ($client->isAccessTokenExpired()) {
            //         $refreshToken = $googleToken->refresh_token;
            //         $client->fetchAccessTokenWithRefreshToken($refreshToken);
            //         $newAccessToken = $client->getAccessToken();
            //         $googleToken->update([
            //             'access_token' => json_encode($newAccessToken),
            //             'expires_at' => Carbon::now()->addSeconds($newAccessToken['expires_in']),
            //         ]);
            //     }
            // } else {
            //     return redirect()->route('google.calendar.auth', ['room_id' => $roomId]);
            // }
            if ($googleToken) {
                $token = json_decode($googleToken->access_token, true);
                $client->setAccessToken($token);

                if ($client->isAccessTokenExpired()) {
                    $refreshToken = $googleToken->refresh_token;
                    $newAccessToken = $client->fetchAccessTokenWithRefreshToken($refreshToken);
                    if (isset($newAccessToken['access_token'])) {
                        $googleToken->update([
                            'access_token' => json_encode($newAccessToken),
                            'expires_at' => Carbon::now()->addSeconds($newAccessToken['expires_in']),
                        ]);
                    } else {
                        return redirect()->route('google.calendar.auth', ['room_id' => $roomId]);
                    }
                }
            } else {
                return redirect()->route('google.calendar.auth', ['room_id' => $roomId]);
            }


            $guestUsers = Employee::whereIn('employee_id', $guests)->get();
            $user = Employee::find($data['employee_id']);
            $room = Room::find($data['room_id']);

            // Create Google Calendar service
            $service = new Calendar($client);

            $meetingLink = null; // Initialize meeting link variable

            $meetingVia = $request->input('meetingvia');
            // Check if the meeting type is Google Meet
            if ($meetingVia === 'Google Meet') {
                $conferenceData = new ConferenceData();
                $conferenceRequest = new CreateConferenceRequest();
                $conferenceRequest->setRequestId(uniqid());
                $conferenceData->setCreateRequest($conferenceRequest);

                $event = new Event([
                    'summary' => 'Meeting: ' . $data['desc'],
                    'location' => "Intiland Tower LT. 20 - " . $room->room_name . "(" . $room->capacity . ")",
                    'start' => [
                        'dateTime' => $startDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'end' => [
                        'dateTime' => $endDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'attendees' => array_merge(
                        array_map(fn($guestId) => ['email' => Employee::find($guestId)->email], $guests),
                        array_map(fn($email) => ['email' => $email], $externalGuests)
                    ),
                    'conferenceData' => $conferenceData,
                ]);

                $calendarId = 'primary';
                $createdEvent = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);

                // Update the booking with the Google Meet link
                $googleMeetLink = $createdEvent->getHangoutLink();
                $booking->update(['google_event_id' => $createdEvent->id]);
                $hybridData = [
                    'via' => $request->input('meetingvia'),
                    'link' => $googleMeetLink,
                    'booking_id' => $booking->id,
                ];

                HybridMeeting::create($hybridData);

                // Set the meeting link to Google Meet link
                $meetingLink = $googleMeetLink;
            } elseif ($meetingVia === 'Zoom') {
                $zoomMeeting = $this->createZoomMeeting($startDate, $endDate, $data['desc']);
                $zoomMeetingLink = $zoomMeeting['join_url'];

                $hybridData = [
                    'via' => $meetingVia,
                    'link' => $zoomMeetingLink,
                    'booking_id' => $booking->id,
                ];
                HybridMeeting::create($hybridData);

                $event = new Event([
                    'summary' => 'Meeting: ' . $data['desc'],
                    'location' => "Intiland Tower LT. 20 - " . $room->room_name . "(" . $room->capacity . ")",
                    'description' => "Link Zoom: " .  $zoomMeetingLink,
                    'start' => [
                        'dateTime' => $startDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'end' => [
                        'dateTime' => $endDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'attendees' => array_merge(
                        array_map(fn($guestId) => ['email' => Employee::find($guestId)->email], $guests),
                        array_map(fn($email) => ['email' => $email], $externalGuests)
                    ),
                ]);

                $calendarId = 'primary';
                $createdEvent = $service->events->insert($calendarId, $event);

                $booking->update(['google_event_id' => $createdEvent->id]);

                // Set the meeting link to Zoom link
                $meetingLink = $zoomMeetingLink;
            } else {
                $event = new Event([
                    'summary' => 'Meeting: ' . $data['desc'],
                    'location' => "INTILAND TOWER LT. 20 - " . $room->room_name . "(" . $room->capacity . ")",
                    'start' => [
                        'dateTime' => $startDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'end' => [
                        'dateTime' => $endDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'attendees' => array_merge(
                        array_map(fn($guestId) => ['email' => Employee::find($guestId)->email], $guests),
                        array_map(fn($email) => ['email' => $email], $externalGuests)
                    ),
                ]);

                $calendarId = 'primary';
                $createdEvent = $service->events->insert($calendarId, $event);

                $booking->update(['google_event_id' => $createdEvent->id]);
            }


            $data['name'] = $user->full_name;
            $data['email'] = $user->email;
            $data['telephone'] = $user->phone;
            $data['room_name'] = $room->room_name;
            $data['meeting_link'] = $meetingLink; // Add the meeting link to data

            // Send email to the user who booked
            Mail::to($user->email)->send(new BookingSubmitted($data, $guestUsers, $externalGuests));

            // Send email to internal guests

            foreach ($guestUsers as $guestUser) {
                Mail::to($guestUser->email)->send(new GuestNotification($booking, $guestUser, $meetingLink));
            }

            // Send email to external guests
            if ($request->has('additional_emails')) {
                foreach ($externalEmails as $email) {
                    Mail::to($email)->send(new ExternalGuestNotification($booking, $email, $meetingLink));
                }
            }

            return redirect()->back()->with('status', 'The room has been successfully booked!');
        }
    }



    private function createZoomMeeting($startDate, $endDate, $description)
    {
        $client = new GuzzleClient(['base_uri' => 'https://api.zoom.us']);
        $response = $client->request('POST', '/v2/users/me/meetings', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getZoomAccessToken(),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'topic' => $description,
                'type' => 2,
                'start_time' => $startDate->toIso8601String(),
                'duration' => $startDate->diffInMinutes($endDate),
                'timezone' => 'Asia/Jakarta',
                'settings' => [
                    'join_before_host' => true,
                    'host_video' => true,
                    'participant_video' => true,
                    'mute_upon_entry' => true,
                    'waiting_room' => false,
                    'approval_type' => 2,
                ],
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    private function getZoomAccessToken()
    {
        $client = new GuzzleClient();

        $zoomClientId = config('services.zoom.client_id');
        $zoomClientSecret = config('services.zoom.client_secret');
        $zoomAccountId = config('services.zoom.account_id');
        $response = $client->post('https://zoom.us/oauth/token', [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($zoomClientId . ':' . $zoomClientSecret),
                // 'Authorization' => 'Basic ' . base64_encode('u_cs9PuxRZav8N3iA3FAjQ:RPIS45irKqD9F2nBwGukbyMzvil74agY'),

                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'grant_type' => 'account_credentials',
                'account_id' => $zoomAccountId,

            ],
        ]);

        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);

        return $data['access_token'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $this->authorize('owner', $booking);
        $users = Employee::all();
        return view('bookingroom.edit', compact('booking', 'users'));
    }

    public function update(BookingRequest $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $data = $request->validated();
        $startDate = Carbon::parse($data['start']);
        $endDate = Carbon::parse($data['end']);
        $roomId = $data['room_id'];

        $today = Carbon::today();
        $maxDate = $today->copy()->addWeeks(1);

        // Check if the start and end dates are within one week from today
        if ($startDate < $today || $startDate > $maxDate || $endDate < $today || $endDate > $maxDate) {
            return redirect()->back()->with('error', 'Failed updating booking. Booking date must be within one week from today.');
        }

        $availableRooms = Room::where('id', $roomId)
            ->whereNotIn('id', function ($query) use ($startDate, $endDate, $booking) {
                $query->select('room_id')
                    ->from('bookings')
                    ->where(function ($query) use ($startDate, $endDate, $booking) {
                        $query->where(function ($query) use ($startDate, $endDate) {
                            $query->where('start', '<', $endDate)
                                ->where('end', '>', $startDate);
                        })
                            ->where('id', '<>', $booking->id); // Exclude current booking
                    });
            })
            ->exists();

        if (!$availableRooms) {
            return redirect()->back()->with('error', 'Failed booking. Room at that time already booked, choose another room or time!');
        } else {
            $data['confirmation_sent'] = false;

            // Update booking data
            $booking->update($data);

            // Handle internal guests
            Guest::where('booking_id', $booking->id)->delete();
            $guests = $request->input('guests', []);
            foreach ($guests as $guestId) {
                Guest::create([
                    'employee_id' => $guestId,
                    'booking_id' => $booking->id,
                ]);
            }

            // Handle external guests
            $externalGuests = [];
            if ($request->has('additional_emails')) {
                $validatedData = $request->validate([
                    'additional_emails.*' => 'email',
                ]);

                $externalEmails = $validatedData['additional_emails'];
                foreach ($externalEmails as $email) {
                    Externalguest::create([
                        'email' => $email,
                        'booking_id' => $booking->id,
                    ]);
                    $externalGuests[] = $email;  // Tambahkan email ke array externalGuests
                }
            } else {
                $externalGuests = [];
            }

            // Hapus data HybridMeeting yang ada sebelum menambah yang baru
            HybridMeeting::where('booking_id', $booking->id)->delete();

            // Initialize Google Client
            $client = new Client();
            $client->setAuthConfig(config_path('credentials/client_secret.json'));
            $client->addScope(Calendar::CALENDAR);
            $client->setAccessType('offline');

            $googleToken = auth()->user()->googleToken;
            if ($googleToken) {
                $token = json_decode($googleToken->access_token, true);
                $client->setAccessToken($token);

                if ($client->isAccessTokenExpired()) {
                    $refreshToken = $googleToken->refresh_token;
                    $newAccessToken = $client->fetchAccessTokenWithRefreshToken($refreshToken);
                    if (isset($newAccessToken['access_token'])) {
                        $googleToken->update([
                            'access_token' => json_encode($newAccessToken),
                            'expires_at' => Carbon::now()->addSeconds($newAccessToken['expires_in']),
                        ]);
                    } else {
                        return redirect()->route('google.calendar.auth', ['room_id' => $roomId]);
                    }
                }
            } else {
                return redirect()->route('google.calendar.auth', ['room_id' => $roomId]);
            }

            $service = new Calendar($client);

            $guestUsers = Employee::whereIn('employee_id', $guests)->get();
            $user = Employee::find($booking->employee_id);
            $room = Room::find($booking->room_id);
            $br_number = $booking->br_number;

            $meetingLink = null;
            $meetingVia = $request->input('meetingvia');

            // Delete existing event
            if ($booking->google_event_id) {
                $service->events->delete('primary', $booking->google_event_id);
            }

            // if ($booking->google_event_id) {
            //     // Periksa apakah event ada di Google Calendar
            //     $event = $service->events->get('primary', $booking->google_event_id);

            //     // Jika event ada, hapus
            //     if ($event) {
            //         $service->events->delete('primary', $booking->google_event_id);
            //     }

            //     // Jika event tidak ada, set google_event_id ke null
            //     if (!$event) {
            //         $booking->google_event_id = null; // Atur menjadi null jika event tidak ada
            //         $booking->save();
            //     }
            // }
            if ($meetingVia === 'Google Meet') {
                $conferenceData = new ConferenceData();
                $conferenceRequest = new CreateConferenceRequest();
                $conferenceRequest->setRequestId(uniqid());
                $conferenceData->setCreateRequest($conferenceRequest);

                $event = new Event([
                    'summary' => 'Meeting: ' . $data['desc'],
                    'location' => "INTILAND TOWER LT. 20 - " . $room->room_name . "(" . $room->capacity . ")",
                    'start' => [
                        'dateTime' => $startDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'end' => [
                        'dateTime' => $endDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'attendees' => array_merge(
                        array_map(fn($guestId) => ['email' => Employee::find($guestId)->email], $guests),
                        // array_map(fn($email) => ['email' => $email], $externalGuests)
                        array_map(fn($email) => ['email' => $email], $request->input('additional_emails', []))
                    ),
                    'conferenceData' => $conferenceData,
                ]);

                $calendarId = 'primary';
                $createdEvent = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);

                $googleMeetLink = $createdEvent->getHangoutLink();
                $booking->update(['google_event_id' => $createdEvent->id]);
                // Buat data HybridMeeting baru
                HybridMeeting::create([
                    'via' => $meetingVia,
                    'link' => $googleMeetLink,
                    'booking_id' => $booking->id,
                ]);

                $meetingLink = $googleMeetLink;
            } elseif ($meetingVia === 'Zoom') {
                $zoomMeeting = $this->createZoomMeeting($startDate, $endDate, $data['desc']);
                $zoomMeetingLink = $zoomMeeting['join_url'];

                $event = new Event([
                    'summary' => 'Meeting: ' . $data['desc'],
                    'location' => "Intiland Tower LT. 20 - " . $room->room_name . "(" . $room->capacity . ")",
                    'description' => "Link Zoom: " . $zoomMeetingLink,
                    'start' => [
                        'dateTime' => $startDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'end' => [
                        'dateTime' => $endDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'attendees' => array_merge(
                        array_map(fn($guestId) => ['email' => Employee::find($guestId)->email], $guests),
                        // array_map(fn($email) => ['email' => $email], $externalGuests)
                        array_map(fn($email) => ['email' => $email], $request->input('additional_emails', []))
                    ),
                ]);

                $calendarId = 'primary';
                $createdEvent = $service->events->insert($calendarId, $event);

                $meetingLink = $zoomMeetingLink;
            } else {
                $event = new Event([
                    'summary' => 'Meeting: ' . $data['desc'],
                    'location' => "Intiland Tower LT. 20 - " . $room->room_name . "(" . $room->capacity . ")",
                    'start' => [
                        'dateTime' => $startDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'end' => [
                        'dateTime' => $endDate->toRfc3339String(),
                        'timeZone' => 'Asia/Jakarta',
                    ],
                    'attendees' => array_merge(
                        array_map(fn($guestId) => ['email' => Employee::find($guestId)->email], $guests),
                        // array_map(fn($email) => ['email' => $email], $externalGuests)
                        array_map(fn($email) => ['email' => $email], $request->input('additional_emails', []))
                    ),
                ]);

                $calendarId = 'primary';
                $createdEvent = $service->events->insert($calendarId, $event);
                $booking->update(['google_event_id' => $createdEvent->id]);
            }


            $data['name'] = $user->full_name;
            $data['email'] = $user->email;
            $data['telephone'] = $user->phone;
            $data['room_name'] = $room->room_name;
            $data['meeting_link'] = $meetingLink;
            $data['br_number'] = $br_number;

            // Send email to the user who updated the booking
            Mail::to($user->email)->send(new BookingUpdated($data, $guestUsers, $externalGuests));

            // Send email to internal guests
            foreach (Employee::whereIn('employee_id', $guests)->get() as $guestUser) {
                Mail::to($guestUser->email)->send(new GuestNotificationUpdate($booking, $guestUser, $meetingLink));
            }

            // Send email to external guests
            if ($request->has('additional_emails')) {
                foreach ($request->input('additional_emails', []) as $email) {
                    Mail::to($email)->send(new ExternalGuestNotificationUpdate($booking, $email, $meetingLink));
                }
            }

            return redirect()->back()->with('status', 'The booking has been successfully updated!');
        }
    }

    public function confirmDelete(Booking $booking)
    {
        $this->authorize('owner', $booking);
        return view('bookingroom.confirmdelete', compact('booking'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {

        $this->authorize('owner', $booking);


        // Initialize the Google Client
        $client = new Client();
        $client->setAuthConfig(config_path('credentials/client_secret.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setAccessType('offline');

        // Get the Google token from the authenticated user
        $googleToken = auth()->user()->googleToken;

        if ($googleToken) {
            $token = json_decode($googleToken->access_token, true);
            $client->setAccessToken($token);

            // Check if the access token is expired
            if ($client->isAccessTokenExpired()) {
                // Use the refresh token to get a new access token
                $refreshToken = $googleToken->refresh_token;

                if ($refreshToken) { // Check if the refresh token exists
                    $client->fetchAccessTokenWithRefreshToken($refreshToken);
                    $newAccessToken = $client->getAccessToken();

                    // Save the new access token and update expiry time
                    $googleToken->update([
                        'access_token' => json_encode($newAccessToken),
                        'expires_at' => Carbon::now()->addSeconds($newAccessToken['expires_in']),
                    ]);

                    // Update the client with the new access token
                    $client->setAccessToken($newAccessToken);
                } else {
                    // If no refresh token is available, force re-authentication
                    $authUrl = $client->createAuthUrl();
                    return redirect()->away($authUrl);
                }
            }
        } else {
            // Redirect user to Google for authorization if no token is found
            $authUrl = $client->createAuthUrl();
            return redirect()->away($authUrl);
        }
        // Create Google Calendar service
        $service = new Calendar($client);

        // Delete the event from Google Calendar if google_event_id exists
        if ($booking->google_event_id) {
            $service->events->delete('primary', $booking->google_event_id);
        }
        // Fetch the user who made the booking
        $user = Employee::find($booking->employee_id);

        // Fetch internal guests
        $guestUsers = $booking->guests->map(function ($guest) {
            return Employee::find($guest->employee_id);
        });

        // Fetch external guests
        $externalGuests = $booking->externalGuests->pluck('email');

        // Send cancellation email to the user who made the booking
        Mail::to($user->email)->send(new BookingCancelled($booking, $guestUsers, $externalGuests));

        // Send cancellation emails to internal guests
        foreach ($guestUsers as $guestUser) {
            Mail::to($guestUser->email)->send(new GuestNotificationCancelled($booking, $guestUser));
        }

        // Send cancellation emails to external guests
        foreach ($externalGuests as $email) {
            Mail::to($email)->send(new ExternalGuestNotificationCancelled($booking, $email));
        }

        $booking->delete();

        return redirect()->route('bookingroom.list')->with('status', 'Your booking has been successfully deleted!');
    }

    public function list()
    {
        $bookings = Booking::all();
        return view('bookingroom.list', compact('bookings'));
    }

    public function sendConfirmationEmails()
    {
        $oneHourLater = Carbon::now()->addHour();
        $bookings = Booking::where('start', '<=', $oneHourLater)
            ->where('start', '>', Carbon::now())
            ->where('confirmation_sent', false)
            ->get();

        // $thirtyMinutesLater = Carbon::now()->addMinutes(30);
        // $bookings = Booking::where('start', '<=', $thirtyMinutesLater)
        //                     ->where('start', '>', Carbon::now())
        //                     ->where('confirmation_sent', false)
        //                     ->get();

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
