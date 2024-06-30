<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tnx_id' => 'required|unique:transactions,tnx_id'
        ]);

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->order_id = $validatedData['order_id'];
        $transaction->amount = $validatedData['amount'];
        if ($request->hasFile('screenshot')) {
            $path = $request->file('screenshot')->store('screenshots', 'public');
            $transaction->screenshot = $path;
        }
        $transaction->tnx_id = $validatedData['tnx_id'];
        $transaction->status = 1; // active
        $transaction->save();

        return redirect()->route('dashboard')->with('success', 'Transaction completed successfully!');
    }
}
