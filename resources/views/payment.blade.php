@extends('layouts.app')

@section('content')
    @include('partials.app.header')


    <section class="paymemt-section">
        <div class="container">
            <h2>Complete your payment</h2>
            <br><br>
            <form action="/transactions" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order_id }}">
                <div>
                    <label for="amount">Amount</label>
                    <input type="text" id="amount" name="amount" required>
                </div>
                <div>
                    <label for="screenshot">Screenshot (optional)</label>
                    <input type="file" id="screenshot" name="screenshot" accept="image/*">
                </div>
                <div>
                    <label for="tnx_id">Transaction ID</label>
                    <input type="text" id="tnx_id" name="tnx_id" required>
                </div>
                <div class="modal-btn-group">
                    <button type="submit" class="btn btn-primary">Submit Payment</button>
                </div>
            </form>
        </div>
    </section>


    @include('partials.app.footer')
@endsection
