@extends('brand.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sign Up')
@section('content')
    <h4>Sign up as an Influencer</h4>
    <form class="form-wd">
        <div class="form-group margin-10px-bottom">
            <label class="custom-label text-left">First Name</label><br />
            <input class="medium-input  custom-input" type="text" name="first_name" placeholder="John Doe">
        </div>
        <div class="form-group margin-10px-bottom">
            <label class="custom-label text-left">Email</label><br />
            <input class="medium-input  custom-input" type="text" name="email" placeholder="example.email@gmail.com">
        </div>
        <div class="form-group position-relative margin-10px-bottom">
            <label class="custom-label text-left">Mobile Number</label><br />
            <input class="medium-input custom-input" type="text" name="mobile_no" placeholder="9898239283">
        </div>
        <div class="btns">
            <button class="pink-btn"> Sign up</button>
            <p class="sep-line">Or sign up with</p>
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
            <p class="form-big-para">To ensure quality and effectiveness of our platform, all accounts are manually
                vetted by our team before gaining access to the platform.</p>
        </div>
    </form>
@endsection
