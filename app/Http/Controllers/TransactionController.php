<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'tnx_type' => 'required|numeric',
            'amount' => 'required|numeric',
            'account_type' => 'required|string',
            'account_number' => 'required|string',
            'tnx_id' => 'required|string',
            'screenshot' => 'nullable|image',
        ]);

        // Create a new Transaction instance
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->order_id = $validated['order_id'];
        $transaction->tnx_type = $validated['tnx_type'];
        $transaction->amount = $validated['amount'];
        $transaction->account_type = $validated['account_type'];
        $transaction->account_number = $validated['account_number'];
        $transaction->tnx_id = $validated['tnx_id'];
        $transaction->status = 2; // pending

        if (Transaction::where('order_id', $request->order_id)->count() < 1) {
            // Handle the file upload if a screenshot is provided
            if ($request->hasFile('screenshot')) {
                $path = $request->file('screenshot')->store('screenshots', 'public');
                $transaction->screenshot = $path;
            }

            // Save the transaction to the database
            $transaction->save();

            // Return a JSON response
            return response()->json([
                'success' => true,
                'transaction_id' => $transaction->id,
                'order_id' => $transaction->order_id,
                'created_at' => $transaction->created_at->toISOString()
            ]);
        } else {

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again.'
            ]);
        }
    }




    public function checkStatus(Request $request)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|integer',
            'order_id' => 'required|integer',
        ]);

        $transaction = Transaction::where('id', $validated['transaction_id'])
            ->where('order_id', $validated['order_id'])
            ->first();

        if ($transaction) {
            return response()->json([
                'amount'         => $transaction->amount,
                // 'account_type'   => $transaction->account_type,
                // 'account_number' => $transaction->account_number,
                'tnx_id'         => $transaction->account_number,
                'status'         => $transaction->status == 1 ? 'success' : 'pending',
                // 'screenshot_url' => $transaction->screenshot,
                'created_at' => $transaction->created_at->toISOString()
            ]);
        }

        return response()->json(['status' => 'not_found'], 404);
    }
}
