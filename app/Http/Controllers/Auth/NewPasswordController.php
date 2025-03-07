<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use DerekCodes\TurnstileLaravel\TurnstileLaravel;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.

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
                $status = Password::reset(
                    $request->only('email', 'password', 'password_confirmation', 'token'),
                    function ($user) use ($request) {
                        $user->forceFill([
                            'password' => Hash::make($request->password),
                            'remember_token' => Str::random(60),
                        ])->save();

                        event(new PasswordReset($user));
                    }
                );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
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
