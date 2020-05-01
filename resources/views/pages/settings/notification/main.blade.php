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
            @include('pages.blocks.widgets.notification_block')
        </ul>

        <!-- ... end Notification List -->

    </div>


    <!-- Pagination -->

    <nav aria-label="Page navigation">
        {{ $notifications->links('vendor.pagination.notification') }}
    </nav>

    <!-- ... end Pagination -->

</div>
