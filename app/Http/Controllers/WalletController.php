<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index() {
        $user = Auth::user();
        $trades = Order::where('user_id', $user->id)->where('status', 1)->take(10)->get();
        return view('wallet', compact('user', 'trades'));
    }
}
