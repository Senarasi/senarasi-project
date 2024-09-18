<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\MeetingBooking;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;
    public function owner(Employee $user, MeetingBooking $booking)
    {
        // Check if the user is admin
        if ($user->role === 'admin') {
            return Response::allow(); // Admin is allowed to delete any booking
        }
        return $user->employee_id === $booking->employee_id
                ? Response::allow()
                : Response::deny('You do not own this booking.');
    }
}
