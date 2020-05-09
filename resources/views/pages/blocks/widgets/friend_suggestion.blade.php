<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">@lang('Friend Suggestions')</h6>
    </div>
    <!-- W-Action -->

    <ul class="widget w-friend-pages-added notification-list friend-requests list-friends-suggestion">
        @if ($suggestUsers->count() > 0)
            @foreach ($suggestUsers as $user)
                @include('pages.blocks.widgets.one_friend_suggestion')
            @endforeach
        @else
            <li class="inline-items">
                <div class="notification-event">
                    <h5  class="h6 notification-friend">@lang('No Friend Suggestions')</h5>
                </div>
            </li>
        @endif
    </ul>

    <!-- ... end W-Action -->
</div>
