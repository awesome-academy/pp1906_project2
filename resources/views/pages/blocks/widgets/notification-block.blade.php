@foreach($notifications as $notification)
<li @if ($notification->isRead()) class="notification-background" @endif>
    <div class="author-thumb">
        <img class="default-avatar" src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{auth()->user()->name}}">
    </div>

    <div class="notification-event">
        <div>
            <a href="#" class="h6 notification-friend sender">{{ $notification->sender->name }}</a>
            @if ($notification->isShare())
                {!! __('notification.share', ['notification_id' => $notification->id]) !!}
            @else
                {!! __('notification.react', ['notification_id' => $notification->id]) !!}
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
        @endif
        >
    </span>
</li>
@endforeach
