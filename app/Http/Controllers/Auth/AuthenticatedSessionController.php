<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use DerekCodes\TurnstileLaravel\TurnstileLaravel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $turnstileResponse = $request->input('cf-turnstile-response');

        $turnstile = new TurnstileLaravel();
        try {

             $response = $turnstile->validate($turnstileResponse);

             if ($response['status'] != 1) {

                 $response = [
                     'success' => false,
                     'message' => "Validation error",
                     'data' => 'Turnstile validation failed'
                 ];
             } else {
                 // Validation successful
                 $response = [
                     'success' => true,
                     'message' => "Validation successful",
                 ];
             }
             if ($response['success']) {
                $request->authenticate();

                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            }else {
                        return redirect()->back()->withErrors(['captcha' => 'CAPTCHA verification failed. Please try again.']);
                    }
            } catch (\Exception $e) {
                // Catch any exceptions that occur
                $response = [
                    'success' => false,
                    'message' => "An error occurred",
                    'data' => $e->getMessage()
                ];


                return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
            }
        }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
