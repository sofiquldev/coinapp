<?php
use App\Models\SiteOption;

class CustomCurrencyFormatter
{
    protected static $currencySymbols = [
        'USD' => '$',
        'EUR' => '€',
        'JPY' => '¥',
        'GBP' => '£',
        'AUD' => 'A$',
        'CAD' => 'C$',
        'CHF' => 'CHF',
        'CNY' => '¥',
    ];

    public static function formatCurrency($amount, $isoCode = 'USD')
    {
        $symbol = self::$currencySymbols[$isoCode] ?? '$';
        return $symbol . number_format($amount, 2). ' '. $isoCode;
    }
}

if (!function_exists('currencyHelper')) {
    function currencyHelper($amount)
    {
        $siteCurrency = SiteOption::where('key', 'site-currency')->first();
        $isoCode = $siteCurrency->value ?? 'USD';

        return CustomCurrencyFormatter::formatCurrency($amount, $isoCode);
    }
}
