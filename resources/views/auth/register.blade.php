@extends('auth.master')

@section('content')
<div class="register form-box">
    @include('auth.form_logo')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- User name -->
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="@lang('Name')">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- User name -->
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="@lang('Username')">

        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Email -->
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="@lang('Email')">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Password -->
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="@lang('Password')">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Confirm Password -->
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="@lang('Confirm password')">

        <button type="submit" class="btn btn-social"> @lang('SIGN UP') </button>
    </form>
    <a href="{{ route('login') }}" class="login-action" title="login">
        <p> @lang('Have an account?') </p>
    </a>
</div>
<!--close form-box-->
@endsection
