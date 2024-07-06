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
        // Validate the request data
        $request->validate([
            'tnx_id' => 'required|integer|exists:transactions,id',
            'tnx_status' => 'required|integer'
        ]);
    
        $transaction = Transaction::find($request->input('tnx_id'));
        $order_id = Transaction::find($request->input('tnx_id'))->order->id;
        $order = Order::find($order_id);
    
        // Update the status
        $transaction->status = intval($request->input('tnx_status'));
        $order->status = intval($request->input('tnx_status'));
    
        // Save the changes
        $transaction->save();
        $order->save();
    
        // Return a response
        return response()->json(['message' => 'Transaction updated successfully.', 'order'=>$order]);
    }



    public function withdraw() {
        return view('withdraw');
    }
    public function withdrawPost(Request $request) {
        return view('withdraw');
    }
    public function withdrawProcess() {
        return view('withdraw-process');
    }
    
}
