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
                <div>
                    <label for="amount">Amount ({{ $site_currency }})</label>
                    <input type="number" id="amount" name="amount" min="{{ env('SITE_MIN_DEPOSITE', 100) }}" value="{{ env('SITE_MIN_DEPOSITE', 100) }}" required>
                </div>
                <div>
                    <label for="account_type">Account Type</label>
                    <select id="account_type" name="account_type" required>
                        <optgroup label="Bangladesh">
                            <option value="bkash">Bkash</option>
                            <option value="nagad">Nagad</option>
                            <option value="dutch-bangla-bank-limited">Dutch-Bangla Bank Limited (DBBL)</option>
                            <option value="sonali-bank">Sonali Bank</option>
                            <option value="rupali-bank">Rupali Bank</option>
                            <option value="brac-bank">BRAC Bank</option>
                            <option value="city-bank">City Bank</option>
                            <option value="ab-bank">AB Bank</option>
                            <option value="islami-bank">Islami Bank</option>
                            <option value="prime-bank">Prime Bank</option>
                        </optgroup>
                        <optgroup label="Pakistan">
                            <option value="habib-bank-limited">Habib Bank Limited (HBL)</option>
                            <option value="united-bank-limited">United Bank Limited (UBL)</option>
                            <option value="mcg-bank">MCG Bank</option>
                            <option value="bank-alfalah">Bank Alfalah</option>
                            <option value="meezan-bank">Meezan Bank</option>
                            <option value="askari-bank">Askari Bank</option>
                            <option value="faysal-bank">Faysal Bank</option>
                            <option value="standard-chartered">Standard Chartered</option>
                            <option value="mcb-bank">MCB Bank</option>
                            <option value="bank-of-punjab">Bank of Punjab (BOP)</option>
                        </optgroup>
                        <optgroup label="India">
                            <option value="hdfc-bank">HDFC Bank</option>
                            <option value="icici-bank">ICICI Bank</option>
                            <option value="state-bank-of-india">State Bank of India (SBI)</option>
                            <option value="axis-bank">Axis Bank</option>
                            <option value="kotak-mahindra-bank">Kotak Mahindra Bank</option>
                            <option value="indusind-bank">IndusInd Bank</option>
                            <option value="yes-bank">Yes Bank</option>
                            <option value="punjab-national-bank">Punjab National Bank</option>
                            <option value="bank-of-baroda">Bank of Baroda</option>
                            <option value="canara-bank">Canara Bank</option>
                        </optgroup>
                        <optgroup label="UAE">
                            <option value="emirates-nbd">Emirates NBD</option>
                            <option value="abu-dhabi-commercial-bank">Abu Dhabi Commercial Bank (ADCB)</option>
                            <option value="dubai-islamic-bank">Dubai Islamic Bank</option>
                            <option value="rakbank">RAKBANK</option>
                            <option value="mashreq-bank">Mashreq Bank</option>
                            <option value="national-bank-of-abu-dhabi">National Bank of Abu Dhabi (NBAD)</option>
                            <option value="abu-dhabi-islamic-bank">Abu Dhabi Islamic Bank (ADIB)</option>
                            <option value="first-abu-dhabi-bank">First Abu Dhabi Bank (FAB)</option>
                            <option value="noor-bank">Noor Bank</option>
                            <option value="union-national-bank">Union National Bank (UNB)</option>
                        </optgroup>
                    </select>
                </div>
                <div>
                    <label for="account_number">Account Number</label>
                    <input type="text" id="account_number" name="account_number" required>
                </div>
                <div>
                    <label for="tnx_id">Transaction ID</label>
                    <input type="text" id="tnx_id" name="tnx_id" required>
                </div>
                <div>
                    <label for="screenshot">Screenshot (optional)</label>
                    <input type="file" id="screenshot" name="screenshot" accept="image/*">
                </div>
                <div class="modal-btn-group">
                    <button type="submit" class="btn btn-primary">Deposit Cash</button>
                </div>
            </form>
        </div>
    </section>


    @include('partials.app.footer')
@endsection
