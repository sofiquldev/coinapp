<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Transaction;
use GrahamCampbell\ResultType\Success;
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

        $order = new Order();
        $order->user_id = Auth::id();
        $order->coin_name = $request->coin;
        $order->rate = $request->rate;
        $order->cost = $request->invested_money;
        $order->coin_amount = $request->coin_amount;
        $order->total = $request->invested_money; // Assuming total is same as invested_money for simplicity
        $order->status = 2; // on-process
        $order->save();

        // Redirect to payment page with order details
        return redirect()->route('payment', ['order_id' => $order->id]);
    }

    public function paymentPage(Request $request)
    {
        $order_id = $request->query('order_id');
        $data = Order::where('id', $order_id)->first();
        return view('payment', ['data' => $data]);
    }

    public function updateOrder(Request $request) {
        // Transaction
        $tnx_id = $request->query('tnx_id');
        $transection = Transaction::findOrFail($tnx_id);
        return json_encode($transection);
        return json_encode([
            'status'    => 'success',
            'message'   => 'Order/Transection Updated!'
        ]);
    }
}
