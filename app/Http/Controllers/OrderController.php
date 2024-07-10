<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Transaction;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        if($request->invested_money < 1) {
            return redirect()->route('trade');
        } else {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->coin_name = $request->coin;
            $order->rate = $request->rate;
            $order->cost = $request->invested_money;
            $order->coin_amount = $request->coin_amount;
            $order->time = $request->trade_time;
            $order->total = $request->invested_money; // Assuming total is same as invested_money for simplicity
            $order->status = 2; // on-process
            $order->save();

            // Redirect to deposit page with order details
            return redirect()->route('trade.process', ['trade_id' => $order->id]);
        }
    }

    public function tradeProcess(Request $request) {
        $order_id = $request->trade_id;
        $order = Order::findOrFail($order_id);
        return view('trade-proccess', compact('order'));
    }


    public function updateOrder(Request $request) {

        $order = Order::find($request->input('trade_id'));
        $user = User::findOrFail($order->user_id);
        $trade_result = $request->input('trade_result');

        // Update the status
        $order->status = intval($request->input('trade_status'));
        $order->result = intval($trade_result);

        if($trade_result == 1) { // profit
            $user->balance = $user->balance + $order->total;
            $user->save();
        } else if($trade_result == 2) { // lose
            $user->balance = $user->balance - $order->total;
            $user->save();
        }

        // Save the changes
        $order->save();

        // Return a response
        return response()->json(['message' => 'Transaction updated successfully.', 'order'=>$order]);
    }


    public function checkStatus(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
        ]);

        // if ($transaction) {
        //     return response()->json([
        //         'amount'         => $transaction->amount,
        //         // 'account_type'   => $transaction->account_type,
        //         // 'account_number' => $transaction->account_number,
        //         'tnx_id'         => $transaction->account_number,
        //         'status'         => $transaction->status == 1 ? 'success' : 'pending',
        //         // 'screenshot_url' => $transaction->screenshot,
        //         'created_at' => $transaction->created_at->toISOString()
        //     ]);
        // }

        return response()->json(['status' => 'not_found'], 404);
    }
}
