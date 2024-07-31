<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'tnx_type' => 'required|numeric',
            'amount' => 'required|string',
            'account_type' => 'required|string',
            'account_number' => 'required|string',
            'tnx_id' => 'nullable|string',
            'screenshot' => 'nullable|image',
        ]);

        // Create a new Transaction instance
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->tnx_type = $validated['tnx_type'];
        $transaction->amount = $validated['amount'];
        $transaction->account_type = $validated['account_type'];
        $transaction->account_number = $validated['account_number'];
        $transaction->tnx_id = $validated['tnx_id'] ?? '';
        $transaction->status = 2; // pending

        if ($request->hasFile('screenshot')) {
            $path = $request->file('screenshot')->store('screenshots', 'public');
            $transaction->screenshot = $path;
        }
        $transaction->save();

        if($request->input('tnx_type') == 1) {
            return redirect()->route('thank-you');
        } else if($request->input('tnx_type') == 2) {
            return redirect()->route('withdraw.process');
        } else {
            return redirect()->route('thank-you');
        }
    }

    public function depositProcess() {
        return view('deposit-process');
    }

    public function deposit(Request $request)
    {
        return view('deposit');
    }


    public function withdraw() {
        return view('withdraw');
    }
    public function withdrawProcess() {
        return view('withdraw-process');
    }




    public function updateTnx(Request $request)
    {
        // Validate the request data
        $request->validate([
            'tnx_id' => 'required|integer|exists:transactions,id',
            'tnx_status' => 'required|integer'
        ]);

        $transaction = Transaction::find($request->input('tnx_id'));
        $transaction_type = intval($transaction->tnx_type);
        $transaction_status = intval($request->input('tnx_status'));
        $transaction->status = $transaction_status;

        $user = User::findOrFail($transaction->user->id);
        $transaction->balance = floatval($user->balance);

        $user->save();
        $transaction->save();


        $total_deposit = Transaction::where('user_id', $user->id)
        ->where('tnx_type', 1)
        ->where('status', 1)
        ->sum('amount');
        $total_withdraw = Transaction::where('user_id', $user->id)
            ->where('tnx_type', 2)
            ->where('status', 1)
            ->sum('amount');
        $balance = $total_deposit - $total_withdraw;
        // $balance = $user->balance;
        $user->balance = $balance;
        $user->save();

        // Return a response
        return response()->json(['message' => 'Transaction updated successfully.']);
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
