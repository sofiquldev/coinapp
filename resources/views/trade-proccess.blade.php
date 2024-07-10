@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <section class="paymemt-section">
        <div class="container">
            @if ($order)
                @if ($order->result == null && $order->status == 2)
                    <h2>Thanks! Your Trade is processing now.</h2>
                    <br>
                @else
                    <br>
                    <h2>Invalid Trade ID.</h2>
                    <a class="btn btn-primary" href="{{ route('home') }}">Go Back</a>
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
        </div>
    </section>


    @include('partials.app.footer')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let createdAt = new Date('{{ $order->createdAt }}').getTime();
            let tradeTime = {{ $order->time }};
            startCountdown(createdAt, tradeTime)

            function startCountdown(createdAt, tradeTime) {
                $('#countdown').show();
                var endTime = createdAt + (tradeTime * 1000); // 5 minutes in milliseconds
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
                    $('#time').text("Time's up! Trade Result shown soon.");
                }
            }
        });
    </script>
@endsection
