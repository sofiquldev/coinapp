<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tnx_type',
        'coin',
        'amount',
        'coin_amount',
        'account_type',
        'account_number',
        'tnx_id',
        'balance',
        'screenshot',
        'account_info',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class); // Assuming a Order model exists
    }

    public function getScreenshotUrlAttribute()
    {
        return $this->screenshot ? Storage::url($this->screenshot) : null;
    }
}
