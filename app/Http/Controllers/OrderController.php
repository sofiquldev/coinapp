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
        if($request->filled('amount') && $request->input('amount') > 0) {
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->coin_name = $request->input('coin');
            $order->amount = $request->input('amount');
            $order->trade_type = $request->input('trade_type');
            $order->time = $request->input('trade_time');
            $order->status = 2; // on-process
            $order->save();

            $user = User::findOrFail(auth()->user()->id);
            $balance = json_decode($user->balance ?? '{"btc": 0, "eth": 0, "usdt": 0}', true);
            $balance[strtolower($order->coin_name)] = ($balance[strtolower($order->coin_name)] ?? 0) - $order->amount;
            $user->balance = json_encode($balance);
            $user->update();


            
            // Store Activities
            $log_amount = floatval($order->amount). ' ' . $order->coin_name;
            activityLogger(1, "New trade added for <b>{$order->coin_name}</b>", $order->user_id);
            
            // Redirect to deposit page with order details
            return redirect()->route('trade.process', ['trade_id' => $order->id]);
        } else {
            return redirect()->route('trade')->with('message', 'Insufficient Balance!');
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
        $old_status = $order->status;
        $old_result = floatval($order->result);
        $trade_result = floatval($request->input('result'));
        $trade_status = intval($request->input('trade_status'));
        $trade_amount = floatval($order->amount);

        // Update the status
        $order->status = $trade_status;
        $order->result = $trade_result;
        $user_balance = json_decode($user->balance ?? '{"btc": 0, "eth": 0, "usdt": 0}', true);

        $log_message = "Your trade has been updated.";
        if($trade_result > 0 && $old_status == 2) { // profit
            $user_balance[strtolower($order->coin_name)] = ($user_balance[strtolower($order->coin_name)] ?? 0) + $trade_amount + $trade_result;
            $log_amount = floatval($order->amount). ' ' . $order->coin_name;
            $log_message = "<b class='text-success'>Trade Win!</b> {USER_NAME} profit <b>{$log_amount}</b> has been Added.";
        } else if($old_status == 1) {
            if($old_result !== $trade_result) {
                if($trade_result == 0) {
                    $user_balance[strtolower($order->coin_name)] = ($user_balance[strtolower($order->coin_name)] ?? 0) - ($trade_amount + $old_result);
                    $log_amount = floatval($order->amount). ' ' . $order->coin_name;
                    $log_message = "<b class='text-danger'>Mistake Detected!</b> {USER_NAME} Trade has been lost.";
                } else {
                    $user_balance[strtolower($order->coin_name)] = ($user_balance[strtolower($order->coin_name)] ?? 0) - ($trade_amount + $old_result);
                    $user_balance[strtolower($order->coin_name)] = ($user_balance[strtolower($order->coin_name)] ?? 0) + $trade_amount + $trade_result;
                    $log_amount = floatval($order->amount). ' ' . $order->coin_name;
                    $log_message = "<b class='text-success'>Trade Win!</b> {USER_NAME} profit <b>{$log_amount}</b> has been Added.";
                }
            } else {
                return response()->json(['message' => 'Nothing to updated!.', 'order'=>$order]);
            }
        } else {
            $log_message = "<b class='text-danger'>Mistake Detected!</b> {USER_NAME} Trade has been lost.";
        }
        $user->balance = json_encode($user_balance);
        $user->update();

        // Save the changes
        $order->update();

        activityLogger(1, $log_message, $order->user_id);

        // Return a response
        return response()->json(['message' => 'Trade updated successfully.', 'order'=>$order]);
    }


    public function checkStatus(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
        ]);

        /* if ($transaction) {
            return response()->json([
                'amount'         => $transaction->amount,
                // 'account_type'   => $transaction->account_type,
                // 'account_number' => $transaction->account_number,
                'tnx_id'         => $transaction->account_number,
                'status'         => $transaction->status == 1 ? 'success' : 'pending',
                // 'screenshot_url' => $transaction->screenshot,
                'created_at' => $transaction->created_at->toISOString()
            ]);
        } */

        return response()->json(['status' => 'not_found'], 404);
    }
}
