@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <section class="paymemt-section">
        <style>
            #time {
                font-size: 5em;
                font-weight: 100;
            }
            @media (max-width: 575px) {
                #time {
                    font-size: 3em;
                }
            }
        </style>
        <div class="container">
            @if ($order)
                @if ($order->status == 2)
                    <h2>Thanks! Your Trade is processing now.</h2>
                    <iframe src="https://cdn.lottielab.com/l/895KVrLkjGtTkH.html" width="100%" height="800" frameborder="0"></iframe>
                    <br>
                @else
                    <br>
                    <h2>Invalid Trade ID.</h2>
                    <br>
                @endif

                <div id="countdown" style="display:none;">
                    <p><span id="time"></span></p>
                </div>
                <div id="payment-status" style="display:none;"></div>
            @else
                <h2>Something went wrong!</h2>
                <br><br>
            @endif

            <br>
            <a class="btn btn-primary" href="{{ route('home') }}">Go Back</a>

        </div>
    </section>


    @include('partials.app.footer')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const timeZoneOffset = new Date().getTimezoneOffset() * 60 * 1000;
            let currentTime  = new Date().getTime() + timeZoneOffset,
                createdAt = new Date('{{ $order->created_at }}').getTime(),
                tradeTime = {{ $order->time * 1000 }};

            startCountdown(createdAt, tradeTime);

            function startCountdown(createdAt, tradeTime) {
                $('#countdown').show();
                var endTime = createdAt + tradeTime;
                updateCountdown(endTime);
            }

            function updateCountdown(endTime) {
                let currentTime  = new Date().getTime() + timeZoneOffset,
                    distance = endTime - currentTime;
                    minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (endTime > currentTime) {
                    $('#time').text(minutes + "m " + seconds + "s ");
                    setTimeout(function() {
                        updateCountdown(endTime);
                    }, 1000);
                } else {
                    $('#time').text("Please be patient while your trade is being processed, check in your wallet below for the results.");
                }
            }
        });

    </script>
@endsection
