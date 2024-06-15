@extends('layouts.app')

@section('content')
    @include('partials.app-header')
    @include('sections.home-hero')
    @include('sections.home-about')
    @include('sections.home-service')
    @include('sections.home-integration')
    @include('sections.home-testimonial')
    @include('partials.app-cta')
    @include('partials.app-footer')
@endsection