<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$access)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        if (Auth::check() && Auth::user()->hasRole($access)) {
            return $next($request);
        }

        // $user = Auth::user();
        // if ($user->access()->whereIn('access_name', $access)->exists()) {
        //     return $next($request);
        // }

        return redirect()->route('unauthorized'); // Redirect to the unauthorized view
    }
}
