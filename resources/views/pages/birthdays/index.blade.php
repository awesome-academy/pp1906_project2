@extends('pages.master')

@section('content')

<!-- Main Header Birthday -->

<div class="main-header birthdays-title">
    <div class="content-bg-wrap bg-birthday"></div>
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                <div class="main-header-content">
                    <h1>@lang('Never Miss a Birthday!')</h1>
                    <p>@lang('Welcome to your friends birthdays page! Here you’ll find all your friends birthdays so you’ll never miss one again!')</p>
                </div>
            </div>
        </div>
    </div>

    <img class="img-bottom" src="{{ asset('theme/socialyte/img/birthdays-bottom.png') }}" alt="friends">
</div>

<!-- ... end Main Header Birthday -->
@if ($todayBirthdayUsers->count() == 0)
<div class="mCustomScrollbar" data-mcs-theme="dark">
    <li class="nothing-here-wrapper nothing-here-notification nothing-here-birthdays">
        <div class="notification-event">
            <h6 class="nothing-here">@lang('There\'s no birthday today..')<h6>
        </div>
    </li>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">@lang('Today\'s Birthdays')</h6>
                </div>
            </div>
        </div>

        @foreach ($todayBirthdayUsers as $user)
        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="ui-block">

                <!-- Birthday Item -->

                <div class="birthday-item inline-items">
                    <div class="author-thumb">
                        <img class="default-avatar" src="{{ getAvatar($user->avatar) }}" alt="{{ $user->name }}">
                    </div>
                    <div class="birthday-author-name">
                        <a href="#" class="h6 author-name">{{ $user->name }} </a>
                        <div class="birthday-date">{{ getTranslatedDate($user->birthday) }}</div>
                    </div>
                    <a href="{{ route('user.profile', $user->username) }}" class="btn btn-sm bg-blue">@lang('Go to profile')</a>
                </div>

                <!-- ... end Birthday Item -->

            </div>
        </div>
        @endforeach

    </div>
</div>
@endif

@endsection
