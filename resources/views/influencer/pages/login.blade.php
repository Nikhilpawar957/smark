@extends('brand.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')
    <h4>Welcome back!</h4>
    <p>Enter your credentials to access your account</p>
    <div class="social-login">
        <div class="social-box google">
            <img src="{{ asset('assets/front/img/google-logo.svg') }}">
        </div>
        <div class="social-box facebook">
            <img src="{{ asset('assets/front/img/facebook-logo.svg') }}">
        </div>
        <div class="social-box apple">
            <img src="{{ asset('assets/front/img/apple-logo.svg') }}">
        </div>
    </div>
    <form method="POST" class="form-wd">
        <div class="form-group margin-10px-bottom">
            <label class="custom-label text-left">Mobile Number</label><br />
            <input class="medium-input  custom-input" type="text" name="name" placeholder="9898239283">
        </div>
        <div class="form-group position-relative margin-10px-bottom">
            <label class="custom-label text-left">Password</label><br />
            <input class="medium-input  custom-input" type="text" name="name"
                placeholder="Enter at least 8+ characters">
            <img src="{{ asset('assets/front/img/cross-eye.svg') }}" class="pw-view">
        </div>
        <div class="d-flex justify-content-between">
            <label class="margin-15px-bottom chk-label">
                <input class="d-inline-block align-middle w-auto mb-0 margin-5px-right" type="checkbox" name="account">
                <span class="d-inline-block align-middle">Keep me logged in</span>
            </label>
            <a href="#" class="pink-text">Forgot password?</a>
        </div>
        <div class="btns">
            <button type="submit" class="pink-btn"> Login</button>
            <p class="sep-line">OR</p>
            <button class="white-btn"> Login with OTP</button>
        </div>
    </form>
@endsection
