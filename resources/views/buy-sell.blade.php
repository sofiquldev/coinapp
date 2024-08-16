<?php
$site_currency = App\Models\SiteOption::where('key', 'site-currency')->first();
if(empty($site_currency)) {
    $site_currency = 'INR';
} else {
    $site_currency = $site_currency['value'];
}
$user_coins = json_decode(auth()->user()->coins);
?>

@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <section class="paymemt-section">
        <div class="container">
            <h2>Buy or Sell Coins</h2>
            <p>You can buy coin coins or Sell coin to withdraw blance as money</p>
            <br><br>
            <form method="post" enctype="multipart/form-data" id="payment-form" action="{{ route('buy-sell.post') }}">
                @csrf
                <input type="hidden" name="tnx_type" value="1">
                <input type="hidden" id="account_number" name="account_number" value="1">

                <div class="select_coin">
                    <input type="radio" name="account_coin" id="select_coin_btc" value="btc" data-balance="{{ $user_coins->btc }}" checked >
                    <label for="select_coin_btc" class="buy-sell">
                        <img src="https://assets.coincap.io/assets/icons/btc@2x.png" alt="btc">
                        BTC
                        <span class="coin_balance">Balance: {{ $user_coins->btc }} BTC</span>
                    </label>

                    <input type="radio" name="account_coin" id="select_coin_usdt" value="usdt" data-balance="{{ $user_coins->usdt }}">
                    <label for="select_coin_usdt" class="buy-sell">
                        <img src="https://assets.coincap.io/assets/icons/usdt@2x.png" alt="usdt">
                        USDT
                        <span class="coin_balance">Balance: {{ $user_coins->usdt }} USDT</span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="tnx_type">Select Type</label>
                    <select id="tnx_type" name="tnx_type" required>
                        <option value="1" selected>Buy Coin</option>
                        <option value="2">Sell Coin</option>
                    </select>
                </div>
                <div class="form-group has-btn">
                    <label for="amount">Set Amount (<span class="selected_coin_name">BTC</span>)</label>
                    <input type="number" id="amount" name="amount" step="0.00001" min="0" value="0" required>
                    <button type="button" class="sale-all-btn">Sell All</button>
                </div>
                <div class="loading">Loading...</div>
                <div>
                    <p class="coin_address buyCoinExtraField" style="font-size: 1.25em; color: #b1e346;text-transform:uppercase">Bank Account: 356789ryygu7656877</p>
                    <br>
                    <div class="form-group has-btn">
                        <label for="account_number">Bank account numder</label>
                        <input type="text" id="account_number" name="account_number">
                    </div>

                    <div class="form-group has-btn buyCoinExtraField">
                        <label for="tnx_id">Transection ID</label>
                        <input type="text" id="tnx_id" name="tnx_id">
                    </div>

                    <div class="screenshot buyCoinExtraField">
                        <label for="screenshot">Screenshot (After completing the deposit)</label>
                        <input type="file" id="screenshot" name="screenshot" accept="">
                    </div>
                </div>
                <div class="modal-btn-group">
                    <button type="submit" class="btn btn-primary">Submit</a>
                </div>
            </form>
        </div>
    </section>

    @include('partials.app.footer')
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        let tnxType = $('#tnx_type').val();
        let coinName = $('input[name="account_coin"]').find(":checked").val()
        $('.selected_coin_name').text(coinName)
        $('input[name="account_coin"]').on('click', function() {
            $('.selected_coin_name').text($(this).val())
            localStorage.setItem('buy-sale-select-coin', $(this).val())
        })
        $('#tnx_type').on('change', function() {
            updatecoinExtraField($(this).val())
        })
        updatecoinExtraField(tnxType)

        $('.sale-all-btn').on('click', function() {
            var selectedRadio = $('input[name="account_coin"]:checked');
            var balance = selectedRadio.data('balance');
            $('#amount').val(Number(balance))
        })

        function updatecoinExtraField(tnx_type) {
            if(Number(tnx_type) === 1) {
                $('.buyCoinExtraField').show()
                $('.sale-all-btn').hide()
                $('.selected_coin_name').text('{{ $site_currency }}')
            } else {
                $('.buyCoinExtraField').hide()
                $('.sale-all-btn').show()
                $('.selected_coin_name').text(localStorage.getItem('buy-sale-select-coin'))
            }
        }
    });
</script>
@endsection
