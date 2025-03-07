<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use DerekCodes\TurnstileLaravel\TurnstileLaravel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
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
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                event(new Registered($user));

                Auth::login($user);
                    if (!$request->user()->hasVerifiedEmail()) {
                        Auth::logout();
                        return redirect()->route('login');
                    }
                return redirect(RouteServiceProvider::HOME);
            } else {
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
}
