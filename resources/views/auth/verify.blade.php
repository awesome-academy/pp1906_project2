@extends('auth.master')

@section('content')
<div class="email form-box">
    @include('auth.form_logo')
    <h2>
        <p>
            <center> @lang('Verify Your Email Address') </center>
        </p>
    </h2>
    <div class="card-body">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            @lang('A fresh verification link has been sent to your email address.')
        </div>
        @endif

        @lang('Before proceeding, please check your email for a verification link.')
        @lang('If you did not receive the email')
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-social"> @lang('Click here to request another') </button>
        </form>
        @lang('If you have any trouble, please')
        <a class="clear-cache" href="{{ route('cache.clear') }}">@lang('click here')</a>
        @lang('to go back register page')
    </div>
</div>
<!--Close form-box-->
@endsection
