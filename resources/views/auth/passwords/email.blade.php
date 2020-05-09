@extends('auth.master')

@section('content')
<div class="email form-box">
    @include('auth.form_logo')
    <h3>
        <p> @lang('Enter your email address and we will send you a reset link') </p>
    </h3>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email -->
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="@lang('Email')">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button type="submit" class="btn btn-social"> @lang('Send Password Reset Link') </button>
    </form>
</div>
<!--Close form-box-->
@endsection
