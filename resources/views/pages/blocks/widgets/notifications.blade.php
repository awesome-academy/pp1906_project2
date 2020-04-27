<div class="control-icon more has-items dropdown-notifications">
    <a href="#notifications-panel" class="dropdown-toggle show-notifications" data-toggle="dropdown">
        <img src="{{ asset('theme/socialyte/svg-icons/top_bar/notify.svg') }}">
        <div class="data-count label-avatar bg-primary notification-count" data-count="0"></div>
    </a>


    <div class="dropdown more-with-triangle triangle-top-center dropdown-menu" aria-labelledby="dropdownMenuLink">
        <div class="ui-block-title ui-block-title-small">
            <h6 class="title"> @lang('Notifications') </h6>
            <a href="#"> @lang('Mark all as read') </a>
            <a href="#"> @lang('Settings') </a>
        </div>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="notification-list notification-block">
            </ul>
        </div>

        <a href="#" class="view-all bg-primary"> @lang('View All') </a>
    </div>
</div>
