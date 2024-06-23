<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class SiteOption extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'value',
    ];

    public function saveCurrency(Request $request)
    {
        $request->validate([
            'currency' => 'required|string|max:3',
        ]);

        // Check if the key 'site-currency' already exists
        $siteOption = SiteOption::updateOrCreate(
            ['key' => 'site-currency'],
            ['value' => $request->currency]
        );

        return response()->json(['message' => 'Saved!']);
    }
}
