<?php
$site_currency = App\Models\SiteOption::where('key', 'site-currency')->first();
if(empty($site_currency)) {
    $site_currency = 'INR';
} else {
    $site_currency = $site_currency['value'];
}
?>

@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <section class="paymemt-section">
        <div class="container">
            <h2>Deposit Cash</h2>
            <p>Complete your payment</p>
            <br><br>
            <form method="post" enctype="multipart/form-data" id="payment-form" action="{{ route('transactions.post') }}">
                @csrf
                <input type="hidden" name="tnx_type" value="1">
                <input type="hidden" id="account_number" name="account_number" value="1">

                <div class="select_coin">
                    <input type="radio" name="account_type" id="select_coin_btc" value="btc" checked>
                    <label for="select_coin_btc">
                        <img src="https://assets.coincap.io/assets/icons/btc@2x.png" alt="btc">
                        BTC
                    </label>

                    <input type="radio" name="account_type" id="select_coin_usdt" value="usdt">
                    <label for="select_coin_usdt">
                        <img src="https://assets.coincap.io/assets/icons/usdt@2x.png" alt="btc">
                        USDT
                    </label>
                </div>
                <div class="deposit_amount_field">
                    <input type="number" id="amount" name="amount" step="0.00001" min="0" value="0" required>
                </div>
                <div class="loading">Loading...</div>
                <div id="show_wallet">
                    <div class="show_wallet_item btc">
                        <img class="wallet_qr" src="{{ asset('images/wallets/BTC.jpg') }}" alt="0x3956cfbcddf1d75c2f24604653994c4a5fbc20b0">
                        <p class="coin_address">0x3956cfbcddf1d75c2f24604653994c4a5fbc20b0</p>
                    </div>
                    <div class="show_wallet_item usdt">
                        <img class="wallet_qr" src="{{ asset('images/wallets/USDT.jpg') }}" alt="TCFPY5TtXFZ15M68LZpgspNYkR65A3WTRP">
                        <p class="coin_address">TCFPY5TtXFZ15M68LZpgspNYkR65A3WTRP</p>
                    </div>
                </div>
                <div class="modal-btn-group">
                    <button type="button" id="submit_btn" class="btn btn-primary">Generate Wallet Address</button>
                    <button type="submit" id="submit_deposit" class="btn btn-primary">Submit Deposit</a>
                </div>
            </form>
        </div>
    </section>

    @include('partials.app.footer')
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
    $('#submit_btn').on('click', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Get the selected account type value
        const selectedAccountType = $('input[name="account_type"]:checked').val();
        generateWallet(selectedAccountType)

        // var formData = $(this).serialize(); // Serialize the form data



        // $.ajax({
        //     url: '{{ route('transactions.post') }}',
        //     type: 'POST',
        //     data: formData,
        //     success: function(response) {
        //         $('.submit_btn').on('click', function() {
        //             window.location.href = "{{ route('thank-you') }}"
        //         })
        //     },
        //     error: function(error) {
        //         // Handle error
        //     }
        // });
    });


    $('input[name="account_type"]').on('click', function(){
        $(`#show_wallet, .show_wallet_item`).hide()
        $(`#show_wallet`).hide(300)
        $('#submit_deposit').hide()
        $('#submit_btn').show()
    })

    function generateWallet(wallet) {
        $('.loading').show(100)
        setTimeout(() => {
            $('.loading').hide(100)
            $(`#show_wallet, .show_wallet_item`).hide()
            $(`#show_wallet .${wallet}`).show()
            $(`#show_wallet`).show(300)


            $('#submit_deposit').show()
            $('#submit_btn').hide()
        }, 2000);
    }

});

</script>
@endsection
