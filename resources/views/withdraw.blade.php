<?php
use Illuminate\Support\Facades\Auth;

$site_currency = App\Models\SiteOption::where('key', 'site-currency')->first();
if (empty($site_currency)) {
    $site_currency = 'INR';
} else {
    $site_currency = $site_currency['value'];
}

// use App\Models\User;
$balance = json_decode(Auth::user()->balance);
?>

@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <section class="paymemt-section">
        <div class="container">
            <h2 id="form-title">Withdraw Request</h2>
            <br><br>
            @if (Auth::user()->status == 5)
                <h3 style="color: #c4f241">Your Account has been &nbsp; <b>Freeze</b></h3>
                <br>
                <p>Please Contact with <a href="mailto:support@mail.com" style="color: #c4f241">Support</a></p>
                <br>
                <a href="mailto:support@mail.com" class="btn btn-nav">Contact to Support</a>
            @else
                <form method="post" enctype="multipart/form-data" id="payment-form"
                    action="{{ route('transactions.post') }}">
                    @csrf
                    <input type="hidden" name="tnx_type" value="2">
                    {{-- <div>
                    <label for="amount">Available for withdraw</label>
                    <h2 style="color: #c4f241">{{ currencyHelper($user_balance) }}</h2>
                </div> --}}
                    <div class="select_coin">
                        <input type="radio" name="account_type" id="select_coin_btc" value="btc"
                            data-balance="{{ $balance->btc }}" checked>
                        <label for="select_coin_btc" class="buy-sell">
                            <img src="https://assets.coincap.io/assets/icons/btc@2x.png" alt="btc">
                            BTC
                            <span class="coin_balance">Balance: {{ $balance->btc }} BTC</span>
                        </label>

                        <input type="radio" name="account_type" id="select_coin_usdt" value="eth"
                            data-balance="{{ $balance->eth }}">
                        <label for="select_coin_usdt" class="buy-sell">
                            <img src="https://assets.coincap.io/assets/icons/eth@2x.png" alt="eth">
                            ETH
                            <span class="coin_balance">Balance: {{ $balance->eth }} ETH</span>
                        </label>
                    </div>
                    <div>
                        <label for="amount">Amount ({{ $site_currency }})</label>
                        <input type="number" id="amount" name="amount" required>
                        <button type="button" class="sale-all-btn">Withdraw All</button>
                    </div>
                    <div>
                        <label for="account_number">Wallet ID (Put your wallet ID)</label>
                        <input type="text" id="account_number" name="account_number"
                            placeholder="0x3956cfbcddf1d75c2f24604653994c4a5fbc20b0" required>
                    </div>
                    <div class="modal-btn-group">
                        <button type="submit" class="btn btn-primary">Withdraw Request</button>
                    </div>
                </form>
            @endif
        </div>
    </section>

    @include('partials.app.footer')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.sale-all-btn').on('click', function() {
                var selectedRadio = $('input[name="account_coin"]:checked');
                var balance = selectedRadio.data('balance');
                $('#amount').val(Number(balance))
            })
        })
    </script>
@endsection
