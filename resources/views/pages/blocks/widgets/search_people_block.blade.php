<div class="selectize-dropdown-content">
    @foreach($searchResult as $user)
    <div class="inline-items">
        <div class="author-thumb">
            <img class="default-avatar" src="{{ getAvatar($user->avatar) }}" alt="{{$user->name}}">
        </div>
        <div class="notification-event">
            <a href="{{ route('user.profile', $user->username) }} " class="h6 notification-friend sender">{{ $user->name }}</a>

            @if ($countMutuals = auth()->user()->countMutualFriends($user->id))
                <span class="chat-message-item">
                {{ $countMutuals }} @lang('Mutual friends')
            </span>
            @endif

        </div>
        
        @if (auth()->user()->bothFriends($user))
            <span class="notification-icon">
                <img src="{{ asset('theme/socialyte/svg-icons/top_bar/is_friend.svg') }}">
            </span>
        @endif
    </div>
    @endforeach
</div>
