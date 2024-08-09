@extends('layouts.app')

@section('content')
    @include('partials.app.header')

    @include('sections.wallet-wallet')
    @include('sections.wallet-transections')
    @include('sections.wallet-trades')
    {{-- @include('sections.wallet-table') --}}

    {{-- @include('partials.app.cta') --}}
    @include('partials.app.footer')
    @include('partials.app.modals.trade')
@endsection
