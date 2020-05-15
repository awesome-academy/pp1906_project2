<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">@lang('Friends')
            @if ($user->friends->count() > 0)
                ({{ $user->friends->count() }})</h6>
            @endif
    </div>
    <div class="ui-block-content">

        <!-- W-Faved-Page -->

        <ul class="widget w-faved-page">
            @foreach ($user->friends->take(config('user.friend_limit')) as $friend)
                <li>
                    <a href="{{ route('user.profile', $friend->username) }}">
                        <img class="default-avatar" src="{{ getAvatar($friend->avatar) }}" alt="{{ $friend->name }}">
                    </a>
                </li>
            @endforeach

            @if ($user->friends->count() > config('user.friend_limit'))
                <li class="all-users">
                    <a href="#">+{{ $user->friends->count() - config('user.friend_limit') }}</a>
                </li>
            @elseif ($user->friends->count() == 0)
                <div class="no-friend">@lang('No Friend')</div>
            @endif
        </ul>

        <!-- .. end W-Faved-Page -->
    </div>
</div>
