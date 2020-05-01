@if ($friendNotifications->isEmpty())
    <div class="mCustomScrollbar" data-mcs-theme="dark">
        <li class="nothing-here-wrapper nothing-here-notification">
            <div class="notification-event friends-notification">
                <h6 class="nothing-here">@lang('There\'s nothing here..')<h6>
            </div>
        </li>
    </div>
@else
    @foreach($friendNotifications as $friendNotification)
        @if ($friendNotification->status == config('user.friend.accept'))
            <li class="accepted">
                <div class="author-thumb">
                    <img class="default-avatar" src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{auth()->user()->name}}">
                </div>
                <div class="notification-event">
                    @lang('You and') <a href="{{ route('user.profile', $friendNotification->sender->username) }}" class="h6 notification-friend">{{ $friendNotification->sender->name }}</a> @lang('just became friends')
                </div>
                <span class="notification-icon">
                    <img src="{{ asset('theme/socialyte/svg-icons/top_bar/friend.svg') }}">
                </span>
            </li>
        @elseif ($friendNotification->status == config('user.friend.request'))
            <li>
                <div class="author-thumb">
                    <img class="default-avatar" src="{{ getAvatar($friendNotification->sender->avatar) }}" alt="{{$friendNotification->sender->name}}">
                </div>
                <div class="notification-event">
                    <a href="{{ route('user.profile', $friendNotification->sender->username) }}" class="h6 notification-friend">{{ $friendNotification->sender->name }}</a>
                    <span class="chat-message-item">@lang('Sent you a friend request')</span>
                </div>
                <span class="notification-icon friends-requesting">
                    <a href="#" class="accept-request accept" data-friend-name="{{ $friendNotification->sender->username }}" data-friend-id="{{ $friendNotification->sender->id }}">
                        <span class="icon-add without-text">
                            <img src="{{ asset('theme/socialyte/svg-icons/top_bar/happy.svg') }}">
                        </span>
                    </a>

                    <a href="#" class="accept-request request-del reject" data-friend-name="{{ $friendNotification->sender->username }}" data-friend-id="{{ $friendNotification->sender->id }}">
                        <span class="icon-minus">
                            <img src="{{ asset('theme/socialyte/svg-icons/top_bar/happy.svg') }}">
                        </span>
                    </a>
                </span>
            </li>
        @endif

    @endforeach
@endif
