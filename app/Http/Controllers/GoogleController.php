<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Google\Client;
use App\Models\GoogleToken;
use Google\Service\Calendar;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function startGoogleAuth(Request $request)
    {
        $user = auth()->user();
        $googleToken = $user->googleToken;

        // Periksa apakah token ada dan valid
        if ($googleToken && !$this->isTokenExpired($googleToken)) {
            // Jika token valid, arahkan langsung ke booking
            return redirect()->route('bookingroom.create', ['room' => $request->input('room_id')]);
        }

        // Jika tidak ada token atau token kedaluwarsa, mulai autentikasi
        $client = new Client();
        $client->setAuthConfig(config_path('credentials/client_secret.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setRedirectUri(route('google.callback'));

        $authUrl = $client->createAuthUrl();
        $request->session()->put('pending_booking', $request->input('room_id'));

        return redirect()->away($authUrl);
    }


    public function handleProviderCallback(Request $request)
    {
        $client = new Client();
        $client->setAuthConfig(config_path('credentials/client_secret.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setAccessType('offline');

        if (!$request->has('code')) {
            return redirect('/')->with('error', 'No authorization code returned from Google.');
        }

        $client->fetchAccessTokenWithAuthCode($request->input('code'));
        $accessToken = $client->getAccessToken();
        $refreshToken = $client->getRefreshToken() ?? auth()->user()->googleToken->refresh_token;  // Gunakan refresh token yang ada jika baru null
        $expiresAt = Carbon::now()->addSeconds($accessToken['expires_in']);

        // Simpan token ke database
        $user = auth()->user();
        GoogleToken::updateOrCreate(
            ['employee_id' => $user->employee_id],
            [
                'access_token' => json_encode($accessToken),
                'refresh_token' => $refreshToken,
                'expires_at' => $expiresAt,
            ]
        );

        // Redirect ke rute bookingroom.create dengan parameter room
        $roomId = $request->session()->pull('pending_booking');

        if (!$roomId) {
            return redirect('/')->with('error', 'No room ID found.');
        }

        return redirect()->route('bookingroom.create', ['room' => $roomId])
            ->with('status', 'Successfully authenticated with Google.');
    }

    public function isTokenExpired($googleToken)
    {
        return Carbon::parse($googleToken->expires_at)->isPast();
    }

    public function checkAndUpdateToken()
    {
        $user = auth()->user();
        $googleToken = $user->googleToken;

        if ($googleToken && $this->isTokenExpired($googleToken)) {
            $client = new Client();
            $client->setAuthConfig(config_path('credentials/client_secret.json'));
            $client->addScope(Calendar::CALENDAR);
            $client->setAccessType('offline');

            // Perbarui token dengan refresh token
            $newAccessToken = $client->fetchAccessTokenWithRefreshToken($googleToken->refresh_token);
            $expiresAt = Carbon::now()->addSeconds($newAccessToken['expires_in']);

            // Simpan token yang diperbarui ke database
            GoogleToken::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'access_token' => json_encode($newAccessToken),
                    'refresh_token' => $googleToken->refresh_token, // Pastikan refresh token tetap sama
                    'expires_at' => $expiresAt,
                ]
            );
        }
    }
}
