@extends('auth.master')

@section('content')
<div class="confirm form-box">
    @include('auth.form_logo')
    <h3>
        <p>
            <center> @lang('Please confirm your password before continuing.') </center>
    </h3>
    </h2>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="@lang('Password')">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror


        <button type="submit" class="btn btn-social"> @lang('Confirm Password') </button>
    </form>
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}" class="login-action" title="Forgot password">
        <p> @lang('Forgot password?') </p>
    </a>
    @endif
</div>
<!--Close form-box-->
@endsection
