<div class="control-icon more has-items dropdown-friends-notifications">
    <a href="#" title="Friend requests" class="dropdown-toggle show-friends-notifications" data-toggle="dropdown">
        <img src="{{ asset('theme/socialyte/svg-icons/top_bar/happy.svg') }}">
        <div class="label-avatar bg-blue friends-notification-count"></div>
    </a>

    <div class="dropdown more-with-triangle triangle-top-center friends-notifications dropdown-menu" aria-labelledby="dropdownMenuLink" style="position: fixed;">
        <div class="ui-block-title ui-block-title-small">
            <h6 class="title"> @lang('FRIEND REQUESTS') </h6>
        </div>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="notification-list friend-requests friends-notification-block">
            </ul>
        </div>

        <a href="#" class="view-all bg-blue"> @lang('View All') </a>
    </div>
</div>
