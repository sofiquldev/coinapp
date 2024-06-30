<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coin_name',
        'rate',
        'cost',
        'coin_amount',
        'total',
        'status',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
