<?php
use App\Models\SiteOption;

if (!function_exists('currencyHelper')) {
    function currencyHelper($amount)
    {
        $siteCurrency = SiteOption::where('key', 'site-currency')->first();
        $isoCode = $siteCurrency->value ?? 'USD';

        $fmt = new NumberFormatter( config('app.locale'), NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($amount, $isoCode).' '.$isoCode;
    }
}

function getCurrencySymbol($isoCode)
{
    $symbols = [
        'USD' => '$',
        'EUR' => '€',
    ];

    return $symbols[$isoCode] ?? '$'; // Default to '$' if not found
}
