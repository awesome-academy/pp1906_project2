@extends('auth.master')

@section('content')
<div class="email form-box">
    <div class="form-logo">
        <p class="text-center"><img src="{{ asset('img/auth/socialyte-logo.png') }}" alt="logo"></p>
    </div>
    <h2>
        <p>
            <center>{{ __('Verify Your Email Address') }}</center>
        </p>
    </h2>
    <div class="card-body">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-social">{{ __('Click here to request another') }}</button>
        </form>
    </div>
</div>
<!--Close form-box-->
@endsection
