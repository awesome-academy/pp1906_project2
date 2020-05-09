<li class="inline-items friends-suggestion-{{ $user->id }}">
    <div class="author-thumb">
        <img class="default-avatar" src="{{ getAvatar($user->avatar) }}" alt="{{ $user->name }}">
    </div>
    <div class="notification-event">
        <a href="{{ route('user.profile', $user->username) }}" class="h6 notification-friend" title="{{ $user->name }}">{{ strLimit($user->name) }}</a>

        @if ($countMutuals = auth()->user()->countMutualFriends($user->id))
            <span class="chat-message-item">{{ $countMutuals }} @lang('Mutual friends')</span>
        @endif

    </div>
    <span class="notification-icon friends-suggestion">
        <a href="#" class="accept-request accept" data-friend-name="{{ $user->username }}" data-friend-id="{{ $user->id }}" title="@lang('Send a friend request
')">
            <span class="icon-add without-text">
                <img src="{{ asset('theme/socialyte/svg-icons/top_bar/happy.svg') }}">
            </span>
        </a>
    </span>
</li>
