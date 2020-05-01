<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">@lang('Notifications')</h6>
            <a href="#" class="mark-all mark-all-as-read">
                <h6>@lang('Mark all as read')</h6>
            </a>
        </div>


        <!-- Notification List -->

        <ul class="notification-list notification-block">
            @foreach($notifications as $notification)
            <li @if ($notification->isRead()) class="un-read" @endif>
                <div class="author-thumb">
                    <img class="default-avatar" src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{ auth()->user->name }}">
                </div>
                <div class="notification-event">
                    <div>
                        <a href="#" class="h6 notification-friend sender">{{ $notification->sender->name }}</a>
                        @if ($notification->isShare())
                            {!! __('notification.share', ['post_id' => $notification->post_id]) !!}
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
                    @endif
                    >
                </span>
            </li>
            @endforeach
        </ul>

        <!-- ... end Notification List -->

    </div>


    <!-- Pagination -->

    <nav aria-label="Page navigation">
        {{ $notifications->links('vendor.pagination.notification') }}
    </nav>

    <!-- ... end Pagination -->

</div>
