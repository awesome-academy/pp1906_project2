@extends('auth.master')

@section('content')
<div class="email form-box">
    <div class="form-logo">
        <p class="text-center"><img src="{{ asset('img/socialyte-logo.png') }}" alt="logo"></p>
    </div>
    <h3>
        <p>{{ __('Enter your email address and we will send you a reset link') }}</p>
    </h3>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email -->
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button type="submit" class="btn btn-social">{{ __('Send Password Reset Link') }}</button>
    </form>
</div>
<!--Close form-box-->
@endsection
