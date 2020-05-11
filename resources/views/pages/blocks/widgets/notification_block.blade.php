@if ($notifications->isEmpty())
    <div class="mCustomScrollbar" data-mcs-theme="dark">
        <li class="nothing-here-wrapper nothing-here-notification">
            <div class="notification-event">
                <h6 class="nothing-here">@lang('There\'s nothing here..')<h6>
            </div>
        </li>
    </div>
@else
    @foreach($notifications as $notification)
        <li @if ($notification->isRead()) class="notification-background" @endif>
            <div class="author-thumb">
                <img class="default-avatar" src="{{ getAvatar($notification->sender->avatar) }}" alt="{{ $notification->sender->name }}">
            </div>

            <div class="notification-event">
                <div>
                    <a href="#" class="h6 notification-friend sender">{{ $notification->sender->name }}</a>
                    @if ($notification->isShare())
                        {!! __('notification.share', ['post_id' => $notification->post_id]) !!}
                    @elseif ($notification->isComment())
                        {!! __('notification.comment', ['post_id' => $notification->post_id]) !!}
                    @elseif ($notification->isReply())
                        {!! __('notification.reply', ['post_id' => $notification->post_id]) !!}
                    @elseif ($notification->isChildReply())
                        {!! __('notification.replies_of_reply', ['post_id' => $notification->post_id]) !!}
                    @else
                        {!! __('notification.react', ['post_id' => $notification->post_id]) !!}
                    @endif
                </div>
                <span class="notification-date">
                    {{ getCreatedFromTime($notification) }}</time>
                </span>
            </div>

            <span class="notification-icon">
                <img 
                @if ($notification->isLike())
                    src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}"
                @elseif ($notification->isLove())
                    src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}"
                @elseif ($notification->isShare())
                    src="{{ asset('theme/socialyte/svg-icons/center/shared.svg') }}"
                @elseif ($notification->isComment())
                    src="{{ asset('theme/socialyte/svg-icons/center/commented.svg') }}"
                @else
                    src="{{ asset('theme/socialyte/svg-icons/center/commented.svg') }}"
                @endif
                >
            </span>
        </li>
    @endforeach
@endif
