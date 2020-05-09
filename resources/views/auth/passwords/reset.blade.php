@extends('auth.master')

@section('content')
<div class="reset form-box">
    @include('auth.form_logo')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <!-- Email -->
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

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
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="@lang('Comfirm Password')">


        <button type="submit" class="btn btn-social"> @lang('Reset Password') </button>
    </form>
</div>
<!--Close form-box-->
@endsection
