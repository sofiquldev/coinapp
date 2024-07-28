@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    <h1 class="thank-you-message">Thank You!</h1>
    @include('partials.app.footer')
    @include('partials.app.modals.trade')
@endsection
