<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use log;

class TurnstileController extends Controller
{
    /*public function verify(Request $request)
    {
        $siteKey = $request->input('siteKey');
        $secretKey = $request->input('secretKey');

        $response = Http::post('https://your-turnstile-api.com/verify', [
            'siteKey' => $siteKey,
            'secretKey' => $secretKey,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $requiresCaptcha = $data['requiresCaptcha'] ?? false;

            return response()->json([
                'success' => true,
                'requiresCaptcha' => $requiresCaptcha,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Failed to verify with Turnstile API',
            ], 500);
        }
    }*/

    /*public function verify(Request $request)
    {
        try {
            // Extract the siteKey and secretKey from the request
            $siteKey = $request->input('siteKey');
            $secretKey = $request->input('secretKey');

            // Make a request to Turnstile API for verification
            $response = Http::post('https://api.cloudflare.com/client/v4', [
                'siteKey' => $siteKey,
                'secretKey' => $secretKey,
            ]);

            // Check if the request was successful
            if ($response->successful()) {
                $data = $response->json();

                // Check if CAPTCHA challenge is required
                $requiresCaptcha = $data['requiresCaptcha'] ?? false;

                // You can return any additional data you need for the frontend
                return response()->json([
                    'success' => true,
                    'requiresCaptcha' => $requiresCaptcha,
                ]);
            } else {
                // Handle error response from Turnstile API
                $errorResponse = $response->json();
                return response()->json([
                    'success' => false,
                    'error' => isset($errorResponse['error']) ? $errorResponse['error'] : 'Failed to verify with Turnstile API',
                ], $response->status());
            }
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            \Log::error('Turnstile Verification Exception: ' . $e->getMessage());

            // Return a generic error response
            return response()->json([
                'success' => false,
                'error' => 'An error occurred while verifying with Turnstile API',
            ], 500);
        }
    }*/

    public function verify(Request $request)
    {
        try {

            $siteKey = $request->input('siteKey');
            $secretKey = $request->input('secretKey');

            // Make a request to Turnstile API for verification
            $response = Http::post('https://api.cloudflare.com/client/v4/accounts/'. config('cloudflare.account_id') .'/captcha/verify', [
                'siteKey' => $siteKey,
                'secretKey' => $secretKey,
            ]);

            // Check if the request was successful
            if ($response->successful()) {
                $data = $response->json();

                // Check if CAPTCHA challenge is required
                $requiresCaptcha = $data['requiresCaptcha'] ?? false;

                // You can return any additional data you need for the frontend
                return response()->json([
                    'success' => true,
                    'requiresCaptcha' => $requiresCaptcha,
                ]);
            } else {
                // Handle error response from Turnstile API
                $errorResponse = $response->json();
                return response()->json([
                    'success' => false,
                    'error' => isset($errorResponse['error']) ? $errorResponse['error'] : 'Failed to verify with Turnstile API',
                ], $response->status());
            }
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error('Turnstile Verification Exception: ' . $e->getMessage());

            // Return a generic error response
            return response()->json([
                'success' => false,
                'error' => 'An error occurred while verifying with Turnstile API',
            ], 500);
        }
    }
}
