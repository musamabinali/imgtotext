<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImgtxtController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('imgtxt');
    }
    public function imgtr()
    {
        return view('imgtr');
    }
    public function translateText(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $text = $request->input('text');

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://translateai.p.rapidapi.com/google/translate/text",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'target_language' => $to,
                'origin_language' => $from,
                'input_text' => $text
            ]),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-rapidapi-host: translateai.p.rapidapi.com",
                "x-rapidapi-key: 9ee26ca731msh9bf22e280c5bca1p15f491jsn7668771f52c1"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
            return response()->json(['error' => 'Translation failed'], 500);
        } else {
            $response = json_decode($response, true);
            return $response["translation"];
        }
    }
}
