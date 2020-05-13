@extends('pages.profile.profile_master')

@section('profile_content')

<div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">@lang('Personal Info')</h6>

            @if ($user->isCurrentUser())
            <a href="/settings" class="social-item change-profile bg-facebook">
                @lang('Change profile')
            </a>
            @endif

        </div>
        <div class="ui-block-content">

            <!-- W-Personal-Info -->

            <ul class="widget w-personal-info">
                <li>
                    <span class="title">@lang('Name'):</span>
                    <span class="text">{{ $user->name }}
                    </span>
                </li>

                <li>
                    <span class="title">@lang('Username'):</span>
                    <span class="text">{{ $user->username }}
                    </span>
                </li>

                @if ($user->gender != '')
                <li>
                    <span class="title">@lang('Gender'):</span>
                    <span class="text">@choice('user.gender', $user->gender)</span>
                </li>
                @endif

                <li>
                    <span class="title">@lang('Email'):</span>
                    <a href="#" class="text">{{ $user->email }}</a>
                </li>

                @if ($user->birthday != '')
                <li>
                    <span class="title">@lang('Birthday'):</span>
                    <span class="text">{{ formatDate($user->birthday) }}</span>
                </li>
                @endif

                @if ($user->introduce != '')
                <li>
                    <span class="title">@lang('Introduce'):</span>
                    <span class="text">{{ $user->introduce }}</span>
                </li>
                @endif

                @if ($user->address != '')
                <li>
                    <span class="title">@lang('Address'):</span>
                    <span class="text">{{ $user->address }}</span>
                </li>
                @endif
            </ul>

            <!-- ... end W-Personal-Info -->
        </div>
    </div>
</div>

@endsection
