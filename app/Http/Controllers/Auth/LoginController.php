<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Redirect to Google login page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback from Google.
     */
    public function handleGoogleCallback()
    {
        try {
            // Ambil informasi pengguna dari Google
            $googleUser = Socialite::driver('google')->user();

            // Cari atau buat user berdasarkan email Google
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('random-password'), // Tidak digunakan karena autentikasi via Google
                ]
            );

            // Login pengguna
            Auth::login($user);

            // Redirect ke dashboard
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            // Tangani error jika ada
            return redirect()->route('login')->with('error', 'Login with Google failed. Please try again.');
        }
    }
}
