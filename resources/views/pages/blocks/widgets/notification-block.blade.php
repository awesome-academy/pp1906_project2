@foreach($notifications as $notification)
<li>
    <div class="author-thumb">
        <img class="default-avatar" src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{auth()->user()->name}}">
    </div>

    <div class="notification-event">
        <div>
            <a href="#" class="h6 notification-friend sender">{{ $notification->sender->name }}</a> @lang('liked your') <a href="#" class="notification-link">@lang(' post')</a>
            .
        </div>
        <span class="notification-date">
            {{ getCreatedFromTime($notification) }}</time>
        </span>
    </div>

    <span class="notification-icon">
        <img src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
    </span>
</li>
@endforeach
