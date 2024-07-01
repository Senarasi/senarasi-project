<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RequestTransport;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestTransportPolicy
{
    use HandlesAuthorization;

    public function ownertr(User $user, RequestTransport $transportrequest)
    {
        // Check if the user is admin
        if ($user->role === 'admin') {
            return true; // Admin is allowed to delete any booking
        }

        return $user->id === $transportrequest->user_id;
    }
}
