@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <div class="thank-you-message">
        <h1>Thank You!</h1>
        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif
        <br>
        <a class="btn btn-primary" href="{{ route('home') }}">Go Back</a>
    </div>
    @include('partials.app.footer')
    @include('partials.app.modals.trade')
@endsection
