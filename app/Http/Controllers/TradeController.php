<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('trade');
    }



    /* public function showCryptoData()
    {
        // Initialize cURL session
        $ch = curl_init();

        // Set the URL and other options
        curl_setopt($ch, CURLOPT_URL, 'https://api.coincap.io/v2/assets');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer '.env("COINCAP_API_KEY", "353192f0-1697-4343-8a35-34fdb4f6d43f")
        ]);

        // Execute the cURL session
        $response = curl_exec($ch);

        // Check for cURL errors
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return view('trade', ['error' => $error]);
        }

        // Close the cURL session
        curl_close($ch);

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check if decoding succeeded
        if (json_last_error() !== JSON_ERROR_NONE) {
            return view('trade', ['error' => 'Failed to decode JSON']);
        }

        // Pass the data to the view
        return view('trade', ['assets' => $data['data']]);
    } */
}
