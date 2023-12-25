@extends('admin.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Smarkerz - Admin Login')
@section('content')

    <form id="loginform" action="{{ route('admin.login_handler') }}" method="POST" onkeydown="return event.key != 'Enter';"
        novalidate="novalidate">
        @csrf

        @if (request()->returnUrl)
            <input type="hidden" name="returnUrl" value="{{ request()->returnUrl }}">
        @endif

        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}

                <button type="button" data-dismiss="alert" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}

                <button type="button" data-dismiss="alert" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="input-group custom">
            <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}">
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
            </div>
        </div>
        @error('email')
            <span class="error_text text-danger">{{ $message }}</span>
        @enderror
        <div class="input-group custom">
            <input type="password" class="form-control form-control-lg" id="password" name="password"
                placeholder="Enter Password">
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
            </div>
        </div>
        @error('password')
            <span class="error_text text-danger">{{ $message }}</span>
        @enderror

        <div class="row">
            <div class="col-sm-12">
                <button type="submit" id="sbmtform" class="pink-btn">Log In</button>
            </div>
        </div>
    </form>

@endsection
@push('scripts')
@endpush
