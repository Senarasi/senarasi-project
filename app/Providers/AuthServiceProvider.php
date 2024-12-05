<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\MeetingBooking;
use App\Policies\BookingPolicy;
use App\Models\RequestTransport;
use App\Policies\RequestTransportPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        MeetingBooking::class => BookingPolicy::class,
        // RequestTransport::class => RequestTransportPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->app->bind('password.broker', function ($app) {
            return Password::broker('employees');
        });
        $this->registerPolicies();
    }
}
