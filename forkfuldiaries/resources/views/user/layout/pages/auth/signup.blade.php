@extends('back.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Sign Up</h2>
        </div>
        <form action="{{ route('user.signup_handler') }}" method="POST">
            <x-form-alerts></x-form-alerts>
            @csrf

            <div class="input-group custom mb-1">
                <input type="text" class="form-control form-control-lg" placeholder="Full Name"
                name="name" value="{{ old('name') }}">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>
            @error('name')
            <span class="text-danger ml-1">{{ $message }}</span>
            @enderror

            <div class="input-group custom mb-1 mt-2">
                <input type="text" class="form-control form-control-lg" placeholder="Username"
                name="username" value="{{ old('username') }}">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>
            @error('username')
            <span class="text-danger ml-1">{{ $message }}</span>
            @enderror

            <div class="input-group custom mb-1 mt-2">
                <input type="email" class="form-control form-control-lg" placeholder="Email"
                name="email" value="{{ old('email') }}">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>
            @error('email')
            <span class="text-danger ml-1">{{ $message }}</span>
            @enderror

            <div class="input-group custom mb-1 mt-2">
                <input type="password" class="form-control form-control-lg" placeholder="Password"
                name="password">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
            </div>
            @error('password')
            <span class="text-danger ml-1">{{ $message }}</span>
            @enderror

            <div class="input-group custom mb-1 mt-2">
                <input type="password" class="form-control form-control-lg" placeholder="Confirm Password"
                name="password_confirmation">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
            </div>
            @error('password_confirmation')
            <span class="text-danger ml-1">{{ $message }}</span>
            @enderror

            <div class="row pb-30">
                <div class="col-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="terms">
                        <label class="custom-control-label" for="customCheck1">Accept Terms</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="forgot-password">
                        <a href="">Already have an account?</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign Up">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection