<?php

use App\Models\SiteOption;
use Illuminate\Support\Facades\Log;

if (!function_exists('fetchCryptoData')) {
    function fetchCryptoData(){
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
            Log::error('cURL Error: ' . $error);
            return ['error' => $error];
        }

        // Close the cURL session
        curl_close($ch);

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check if decoding succeeded
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('JSON Decode Error: ' . json_last_error_msg());
            return ['error' => 'Failed to decode JSON'];
        }

        // Fetch active coins from the database
        $activeCoinsJson = SiteOption::where('key', 'active-coins')->value('value');
        $activeCoins = json_decode($activeCoinsJson, true);

        // Filter the coin data to only include active coins
        $activeAssets = array_filter($data['data'], function($asset) use ($activeCoins) {
            foreach ($activeCoins as $coin) {
                if ($coin['symbol'] === $asset['symbol'] && $coin['isActive']) {
                    return true;
                }
            }
            return false;
        });


        return $activeAssets ?? [];
    }

    // Function to format numbers
    function formatNumber($num) {
        if ($num >= 1e12) {
            return number_format($num / 1e12, 2) . ' T'; // Trillion
        }
        if ($num >= 1e9) {
            return number_format($num / 1e9, 2) . ' B';  // Billion
        }
        if ($num >= 1e6) {
            return number_format($num / 1e6, 2) . ' M';  // Million
        }
        if ($num >= 1e3) {
            return number_format($num / 1e3, 2) . ' K';  // Thousand
        }
        return number_format($num, 2);                   // Less than Thousand
    }

}
