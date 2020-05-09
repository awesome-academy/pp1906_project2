@extends('auth.master')

@section('content')
<div class="login form-box">
    @include('auth.form_logo')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Username -->
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required placeholder="@lang(' Email')">

        @error('email')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Password -->
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="@lang(' Password')">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label class="remember-me"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> @lang('Remember me') </label>

        <button type="submit" class="btn btn-social"> @lang('SIGN IN') </button>
    </form>
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}" class="login-action" title="Forgot password">
        <p> @lang('Forgot password?') </p>
    </a>
    @endif
    <a href="{{ route('register') }}" class="login-action" title="Sign up">
        <p> @lang('New User?') </p>
    </a>
</div>
<!--Close form-box-->
@endsection
