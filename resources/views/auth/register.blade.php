@extends('auth.master')

@section('content')
<div class="register form-box">
    <div class="form-logo">
        <p class="text-center"><img src="{{ asset('img/auth/socialyte-logo.png') }}" alt="logo"></p>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- User name -->
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Email -->
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Password -->
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Confirm Password -->
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">

        <button type="submit" class="btn btn-social">{{ __('SIGN UP') }}</button>
    </form>
    <a href="{{ route('login') }}" class="login-action" title="login">
        <p>Have an account?</p>
    </a>
</div>
<!--close form-box-->
@endsection
