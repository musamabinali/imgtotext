<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        if (Auth::user())
            return redirect()->to('/dashboard');
        else
            return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallbackCredentials()
    {
        try {
            $client = new \Google_Client(['client_id' => Config::get('services.google.client_id')]);  // Specify the CLIENT_ID of the app that accesses the backend
            $payload = $client->verifyIdToken($_REQUEST['credential']);

            Log::info('$googleUser->email',[$payload]);
            if ($payload) {
                $existingUser = User::where('email', $payload['email'])->first();
                if ($existingUser) {

                    // log them in
                } else {
                    // create a new user
                    $newUser = new User;
                    $newUser->name = $payload['given_name'];
                    $newUser->email = $payload['email'];
                    $newUser->google_id = $payload['sub'];
                    $newUser->email_verified_at = now();
                    $newUser->password = bcrypt('Temp@123786');
                    $newUser->remember_token = Str::random(10);
                    $newUser->save();
                    $existingUser = User::where('email', $payload['email'])->first();
                }
                if(is_null($existingUser->email_verified_at)){
                    $existingUser->email_verified_at = now();
                    $existingUser->save();
                }
                Auth::login($existingUser, true);
                if ($existingUser->Subscription) {
                    return redirect()->to('/');
                }
                return redirect()->to('/');
            }else{
                return redirect()->to('/');
            }
        } catch (\Exception $e) {
            return redirect('/');
        }
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();

        } catch (\Exception $e) {
            return redirect('/');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            $existingUser = User::where('email', $user->email)->first();
            // log them in
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->email_verified_at = now();
            $newUser->password        = bcrypt('Temp@123786');
            $newUser->remember_token  = Str::random(10);
            $newUser->save();
            $existingUser = User::where('email', $user->email)->first();
        }
        if(is_null($existingUser->email_verified_at)){
            $existingUser->email_verified_at = now();
            $existingUser->save();
        }
        Auth::login($existingUser, true);
        if($existingUser->Subscription){
            return redirect()->to('/');
        }
        return redirect()->to('/');
    }
}
