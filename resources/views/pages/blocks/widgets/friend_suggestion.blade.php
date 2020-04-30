<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">Friend Suggestions</h6>
    </div>
    <!-- W-Action -->

    <ul class="widget w-friend-pages-added notification-list friend-requests">
        @foreach ($users as $user)
                <li class="inline-items">
                    <div class="author-thumb">
                        <img class="default-avatar" src="{{ getAvatar($user->avatar) }}" alt="{{ $user->name }}">
                    </div>
                    <div class="notification-event">
                        <a href="{{ route('user.profile', $user->username) }}" class="h6 notification-friend">{{ $user->name }}</a>
                        <span class="chat-message-item">8 @lang('Friends in Common')</span>
                    </div>
                    <span class="notification-icon">
                        <a href="#" class="accept-request" title="@lang('Accept friend request')">
                            <span class="icon-add without-text">
                                <img src="{{ asset('theme/socialyte/svg-icons/top_bar/happy.svg') }}">
                            </span>
                        </a>
                    </span>
                </li>
        @endforeach
    </ul>

    <!-- ... end W-Action -->
</div>
