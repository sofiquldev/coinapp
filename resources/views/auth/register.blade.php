@extends('layouts.auth')

@section('content')
    <!-- main-body start -->
    <div class="sign_area login_bg n0-bg d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="d-none d-md-flex col-md-6 col-lg-5 col-xxl-4  justify-content-end">
                    <div class="login_thumb">
                        <img src="{{ asset('dashboard/images/signup.png') }}" class="max-xxl-un" alt="image">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="sign__content ms-md-5 ms-xxl-0 pt-120 pb-120">
                        <div class="head_part d-flex flex-column gap-4">
                            <h3>Let’s Get Started!</h3>
                            <p>Please Enter your Email Address to Start your Online Application</p>
                        </div>
                        <form class="contact__form mt-8 mt-lg-10" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="d-flex flex-column gap-5">
                                <div class="single-input">
                                    <label class="fs-six-up fw-medium mb-2 mb-sm-4" for="name">Full Name</label>
                                    <input type="text" class="fs-seven py-2 py-lg-3 px-3 px-lg-6 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="single-input">
                                    <label class="fs-six-up fw-medium mb-2 mb-sm-4" for="email_ad">Enter Your Email ID</label>
                                    <input type="email" class="fs-seven py-2 py-lg-3 px-3 px-lg-6 @error('email') is-invalid @enderror" id="email_ad" name="email" placeholder="Enter Your Email..." value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="single-input">
                                    <label class="fs-six-up fw-medium mb-2 mb-sm-4" for="password10">Enter Your Password</label>
                                    <div class="input-pass">
                                        <input type="password" class="fs-seven py-2 py-sm-3 ps-3 ps-sm-5 ps-lg-6 pe-10 pe-lg-13 @error('password') is-invalid @enderror" id="password10" name="password" value="123456" placeholder="Password" required autocomplete="new-password">
                                        <span class="password-eye-icon"></span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="single-input">
                                    <label class="fs-six-up fw-medium mb-2 mb-sm-4" for="password-confirm">Confirm Password</label>
                                    <div class="input-pass">
                                        <input type="password" class="fs-seven py-2 py-sm-3 ps-3 ps-sm-5 ps-lg-6 pe-10 pe-lg-13 @error('password') is-invalid @enderror" id="password-confirm" name="password_confirmation" value="123456" placeholder="Confirm Password" required autocomplete="new-password">
                                        <span class="password-eye-icon"></span>
                                    </div>
                                </div>
                                @if (Route::has('login'))
                                    <p>Don’t have an account? <a href="{{ route('login') }}" class="p1-color fw-semibold">Sign In</a></p>
                                @endif
                            </div>
                            <div class="d-flex gap-5 gap-lg-6 mt-7 mt-lg-8">
                                <button type="submit" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Sign Up</button>
                                <a href="{{ route('home') }}"
                                    class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Back Home</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
