@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <section class="paymemt-section">
        <div class="container">
            @if ($order)
                @if ($order->status == 2)
                    <h2>Thanks! Your Trade is processing now.</h2>
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
            let currentTime = Date.now()
            let createdAt = new Date('{{ $order->created_at }}').getTime();
            let tradeTime = {{ $order->time * 1000 }};
            startCountdown(createdAt, tradeTime);

            function startCountdown(createdAt, tradeTime) {
                $('#countdown').show();
                var endTime = createdAt + tradeTime;
                updateCountdown(endTime);
            }

            function updateCountdown(endTime) {
                var distance = endTime - Date.now();
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
