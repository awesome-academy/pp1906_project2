<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">@lang('Friend Requests')</h6>
            <a href="#" class="more"><svg class="olymp-three-dots-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                </svg></a>
        </div>


        <!-- Notification List Frien Requests -->

        <ul class="notification-list friend-requests friends-notification-block">
            @include('pages.blocks.widgets.friend_request_block')
        </ul>

        <!-- ... end Notification List Frien Requests -->
    </div>

    <!-- Pagination -->

    <nav aria-label="Page navigation">
        {{ $friendNotifications->links('vendor.pagination.notification') }}
    </nav>

    <!-- ... end Pagination -->

</div>
