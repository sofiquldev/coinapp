<?php
use App\Models\Transaction;
if ($data) {
    $tnx = Transaction::where('order_id', $data->id)->first();
    if ($tnx) {
        $tnx_id = $tnx->id;
    } else {
        $tnx_id = 0;
    }
}

?>

@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <section class="paymemt-section">
        <div class="container">
            @if ($data)
                @if ($tnx)
                    @if ($tnx->status == 1)
                        <h2>Thanks! Payment received for this order.</h2>
                        <br>
                        @if ($tnx->screenshot)
                            <img src="{{ asset('storage/' . $tnx->screenshot) }}" alt="">
                        @endif
                        <br>

                        <a class="btn btn-primary" href="{{ route('home') }}">Go Back</a>
                        <br>
                    @else
                        <h2>Your Order on procces with our team.</h2>
                        <br>
                        @if ($tnx->screenshot)
                            <img src="{{ asset('storage/' . $tnx->screenshot) }}" alt="">
                        @endif
                        <br>
                        <a class="btn btn-primary" href="{{ route('home') }}">Go Back</a>
                        <br>
                    @endif
                @else
                    <h2 id="form-title">Complete your payment</h2>
                    <br><br>
                    <form method="post" enctype="multipart/form-data" id="payment-form">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $data->id }}">
                        <input type="hidden" name="amount" value="{{ $data->cost }}">
                        <input type="hidden" name="tnx_type" value="1">
                        <div>
                            <label for="amount">Amount</label>
                            <h2 style="color: #c4f241">{{ $data->cost }}</h2>
                        </div>
                        <div>
                            <label for="account_type">Account Type</label>
                            <select id="account_type" name="account_type" required>
                                <option value="bkash">Bkash</option>
                                <option value="nagad">Nagad</option>
                                <option value="dbbl">DBBL</option>
                                <option value="sonali-bank">Sonali Bank</option>
                                <option value="rupali-bank">Rupali Bank</option>
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
                            <button type="submit" class="btn btn-primary">Submit Payment</button>
                        </div>
                    </form>
                @endif
                <div id="countdown" style="display:none;">
                    <p>Time remaining: <span id="time"></span></p>
                </div>
                <div id="payment-status" style="display:none;"></div>
            @else
                <h2>Something went wrong!</h2>
                <br><br>
            @endif
        </div>
    </section>


    @include('partials.app.footer')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            function startCountdown(createdAt) {
                $('#countdown').show();
                var endTime = createdAt + 5 * 60 * 1000; // 5 minutes in milliseconds
                updateCountdown(endTime);
            }

            function updateCountdown(endTime) {
                var now = new Date().getTime();
                var distance = endTime - now;
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (distance > 0) {
                    $('#time').text(minutes + "m " + seconds + "s ");
                    setTimeout(function() {
                        updateCountdown(endTime);
                    }, 1000);
                } else {
                    $('#time').text("Time's up! Payment review in progress.");
                    checkTransactionStatus();
                }
            }

            function checkTransactionStatus() {
                var transactionId = localStorage.getItem('transaction_id');
                var orderId = localStorage.getItem('order_id');
                if (!transactionId || !orderId) {
                    return;
                }

                $.ajax({
                    url: '/transaction-status', // Endpoint to check transaction status
                    type: 'GET',
                    data: {
                        transaction_id: transactionId,
                        order_id: orderId
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.status === 'success') {
                            $('#countdown').hide();
                            $('#payment-status').text("Payment successful!").show();
                        } else if (response.status === 'pending') {
                            var createdAt = new Date(response.created_at).getTime();
                            startCountdown(createdAt);
                        } else {
                            $('#time').text("Payment has been reviewed soon!");
                        }
                    },
                    error: function() {
                        // alert('Error checking transaction status');
                    }
                });
            }

            $('#payment-form').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: '{{ route('transactions.post') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#payment-form').hide();
                            $('#form-title').text('Payment has been reviewed!');
                            var createdAt = new Date(response.created_at).getTime();
                            localStorage.setItem('transaction_id', response
                            .transaction_id); // Save transaction ID
                            localStorage.setItem('order_id', response
                            .order_id); // Save order ID
                            startCountdown(createdAt);
                        } else {
                            alert('Error submitting form');
                        }
                    },
                    error: function() {
                        alert('Error submitting form');
                    }
                });
            });

            // On page load, check if there's an existing countdown in progress
            var transactionId = {{ $tnx_id }};
            var orderId = {{ $data->id }};
            if (transactionId && orderId) {
                $.ajax({
                    url: '/transaction-status',
                    type: 'GET',
                    data: {
                        transaction_id: transactionId,
                        order_id: orderId
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#countdown').hide();
                            $('#payment-status').text("Payment successful!").show();
                        } else if (response.status === 'pending') {
                            var createdAt = new Date(response.created_at).getTime();
                            startCountdown(createdAt);
                            localStorage.setItem('transaction_id', response
                                .transaction_id); // Update transaction ID
                            localStorage.setItem('order_id', response.order_id); // Update order ID
                        } else {
                            $('#time').text("Payment review in progress.");
                            localStorage.removeItem('transaction_id');
                            localStorage.removeItem('order_id');
                        }
                    },
                    error: function() {
                        // alert('Error checking transaction status');
                    }
                });
            }
        });
    </script>
@endsection
