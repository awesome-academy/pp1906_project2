<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">@lang('Activity Feed')</h6>
    </div>

    <!-- W-Activity-Feed -->
    <ul class="widget w-activity-feed notification-list activity-feed-list">
        @if ($activities->count() > 0)
            @include('pages.blocks.widgets.activity_feed_block')
        @else
            <li class="nothing-here-wrapper nothing-here-activity">
                <div class="notification-event">
                    <h6 class="nothing-here">@lang('There\'s nothing here..')<h6>
                </div>
            </li>
        @endif
    </ul>

    <!-- .. end W-Activity-Feed -->
</div>
