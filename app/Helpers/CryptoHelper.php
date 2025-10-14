<?php

use App\Models\SiteOption;
use Illuminate\Support\Facades\Log;

if (!function_exists('fetchCryptoData')) {
    function fetchCryptoData(){
        // Initialize cURL session
        $ch = curl_init();

        // Set the URL and other options for CoinGecko API
        curl_setopt($ch, CURLOPT_URL, 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Accept-Language: en-US,en;q=0.9',
            'Accept-Encoding: gzip, deflate, br',
            'Connection: keep-alive',
            'Upgrade-Insecure-Requests: 1'
        ]);

        // Execute the cURL session
        $response = curl_exec($ch);

        // Check for cURL errors
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            Log::error('cURL Error: ' . $error);
            return ['error' => 'API connection failed: ' . $error];
        }

        // Close the cURL session
        curl_close($ch);

        // Check if response is HTML (likely a block page)
        if (strpos($response, '<!DOCTYPE html>') !== false || strpos($response, '<html') !== false) {
            Log::error('API returned HTML instead of JSON - likely blocked, using fallback data');
            return getFallbackCryptoData();
        }

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check if decoding succeeded
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('JSON Decode Error: ' . json_last_error_msg() . ' - Using fallback data');
            return getFallbackCryptoData();
        }

        // Check if data is valid
        if (!is_array($data) || empty($data)) {
            Log::error('Invalid API response data - Using fallback data');
            return getFallbackCryptoData();
        }

        // Fetch active coins from the database
        $activeCoinsJson = SiteOption::where('key', 'active-coins')->value('value');
        $activeCoins = json_decode($activeCoinsJson, true);

        // If no active coins configured, return empty array
        if (empty($activeCoins)) {
            Log::warning('No active coins configured');
            return [];
        }

        // Transform CoinGecko data to match the expected format
        $transformedAssets = [];
        foreach ($data as $coin) {
            // Check if this coin is active
            $isActive = false;
            foreach ($activeCoins as $activeCoin) {
                if (strtoupper($activeCoin['symbol']) === strtoupper($coin['symbol']) && $activeCoin['isActive']) {
                    $isActive = true;
                    break;
                }
            }
            
            if ($isActive) {
                $transformedAssets[] = [
                    'id' => $coin['id'],
                    'symbol' => strtoupper($coin['symbol']),
                    'name' => $coin['name'],
                    'rank' => $coin['market_cap_rank'],
                    'priceUsd' => $coin['current_price'],
                    'marketCapUsd' => $coin['market_cap'],
                    'supply' => $coin['circulating_supply'],
                    'volumeUsd24Hr' => $coin['total_volume'],
                    'changePercent24Hr' => $coin['price_change_percentage_24h'],
                    'image' => $coin['image']
                ];
            }
        }

        // If no active assets found, provide fallback data
        if (empty($transformedAssets)) {
            Log::warning('No active assets found, providing fallback data');
            return getFallbackCryptoData();
        }

        return $transformedAssets;
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

    // Function to get fallback cryptocurrency data
    function getFallbackCryptoData() {
        return [
            [
                'id' => 'bitcoin',
                'symbol' => 'BTC',
                'name' => 'Bitcoin',
                'rank' => 1,
                'priceUsd' => 112879.50,
                'marketCapUsd' => 2249094168599,
                'supply' => 19934406,
                'volumeUsd24Hr' => 90156024161,
                'changePercent24Hr' => -2.37,
                'image' => 'https://coin-images.coingecko.com/coins/images/1/large/bitcoin.png?1696501400'
            ],
            [
                'id' => 'ethereum',
                'symbol' => 'ETH',
                'name' => 'Ethereum',
                'rank' => 2,
                'priceUsd' => 4123.59,
                'marketCapUsd' => 497398839788,
                'supply' => 120698949,
                'volumeUsd24Hr' => 63566885516,
                'changePercent24Hr' => -3.26,
                'image' => 'https://coin-images.coingecko.com/coins/images/279/large/ethereum.png?1696501628'
            ],
            [
                'id' => 'tether',
                'symbol' => 'USDT',
                'name' => 'Tether',
                'rank' => 3,
                'priceUsd' => 1.001,
                'marketCapUsd' => 180126655827,
                'supply' => 180003740933,
                'volumeUsd24Hr' => 177299386531,
                'changePercent24Hr' => -0.04,
                'image' => 'https://coin-images.coingecko.com/coins/images/325/large/Tether.png?1696501661'
            ],
            [
                'id' => 'binancecoin',
                'symbol' => 'BNB',
                'name' => 'BNB',
                'rank' => 4,
                'priceUsd' => 1216.67,
                'marketCapUsd' => 169230040073,
                'supply' => 139181513,
                'volumeUsd24Hr' => 8846790032,
                'changePercent24Hr' => -5.22,
                'image' => 'https://coin-images.coingecko.com/coins/images/825/large/bnb-icon2_2x.png?1696501970'
            ],
            [
                'id' => 'ripple',
                'symbol' => 'XRP',
                'name' => 'XRP',
                'rank' => 5,
                'priceUsd' => 2.48,
                'marketCapUsd' => 148761617705,
                'supply' => 59916045245,
                'volumeUsd24Hr' => 8099098131,
                'changePercent24Hr' => -5.80,
                'image' => 'https://coin-images.coingecko.com/coins/images/44/large/xrp-symbol-white-128.png?1696501442'
            ]
        ];
    }

}
