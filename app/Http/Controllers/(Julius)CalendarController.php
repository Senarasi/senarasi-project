<?php

namespace App\Http\Controllers;

use App\Models\MeetingBooking;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getevents(Request $request)
    {
        $events = MeetingBooking::with(['employee', 'internalGuest.employee', 'externalGuest'])
            ->where('room_id', $request->room_id)
            ->whereDate('start_time', '>=', $request->start)
            ->whereDate('end_time', '<=', $request->end)
            ->get(['booking_id', 'description as title', 'start_time', 'end_time', 'employee_id']);

        $events = $events->map(function ($event) {
            return [
                'id' => $event->booking_id,
                'title' => $event->title,
                'start' => $event->start_time,
                'end' => $event->end_time,
                'employee_id' => $event->employee_id,
                'extendedProps' => [
                    'user' => $event->employee,

                    'guests' => $event->internalGuest->map(function ($guest) {
                        return $guest->employee->full_name;
                    })->toArray(),

                    'externalGuests' => $event->externalGuest->map(function ($externalGuest) {
                    return $externalGuest->email;
                    })->toArray(),
                ],
            ];
        });

        return response()->json(['events' => $events]);
    }
}
