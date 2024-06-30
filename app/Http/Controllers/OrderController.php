<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'coin' => 'required|string|max:255',
        //     'rate' => 'required|numeric',
        //     'invested_money' => 'required|numeric',
        //     'coin_amount' => 'required|numeric',
        // ]);

        // $order = new Order();
        // $order->user_id = Auth::id();
        // $order->coin_name = $validatedData['coin'];
        // $order->rate = $validatedData['rate'];
        // $order->cost = $validatedData['invested_money'];
        // $order->coin_amount = $validatedData['coin_amount'];
        // $order->total = $validatedData['invested_money']; // Assuming total is same as invested_money for simplicity
        // $order->status = 2; // on-process
        // $order->save();

        // Redirect to payment page with order details
        return redirect()->route('payment', ['order_id' => 1]);
    }

    public function paymentPage(Request $request)
    {
        $order_id = $request->query('order_id');
        return view('payment', ['order_id' => $order_id]);
    }
}
