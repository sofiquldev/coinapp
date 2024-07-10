<?php

// use App\Models\Transaction;
?>

@extends('layouts.app')

@section('content')
@include('partials.app.header')

<section class="paymemt-section">
    <div class="container text-center">
        <br><br>
        <h2 style="color: #c4f241">Thank You!</h2>
        <p>Your Deposit request has been proceed!</p>
        <br>
        <a href="{{ route('home') }}" class="btn btn-header">Go back to Home</a>
        <br><br>
    </div>
</section>


@include('partials.app.footer')
@endsection
