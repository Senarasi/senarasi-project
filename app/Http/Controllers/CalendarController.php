<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getevents(Request $request)
    {
        $events = Booking::with(['user', 'guests.user', 'externalGuests', 'room', 'hybrid'])
            ->where('room_id', $request->room_id)
            ->whereDate('start', '>=', $request->start)
            ->whereDate('end', '<=', $request->end)
            ->get(['id', 'desc as title', 'start', 'end', 'employee_id', 'room_id']);

        $events = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'employee_id' => $event->employee_id,
                'extendedProps' => [
                    'user' => $event->user,
                    'room' => $event->room,
                    'guests' => $event->guests->map(function ($guest) {
                        return $guest->user->full_name;
                    })->toArray(),

                    'externalGuests' => $event->externalGuests->map(function ($externalGuest) {
                    return $externalGuest->email;
                    })->toArray(),
                    'google_meet_link' => $event->hybrid ? $event->hybrid->link : null, // Ambil link dari tabel hybrid
                ],
            ];
        });

        return response()->json(['events' => $events]);
    }
}
