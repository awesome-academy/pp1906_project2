<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">Friend Suggestions</h6>
    </div>
    <!-- W-Action -->

    <ul class="widget w-friend-pages-added notification-list friend-requests list-friends-suggestion">
        @foreach ($suggestUsers as $user)
            @include('pages.blocks.widgets.one_friend_suggestion')
        @endforeach
    </ul>

    <!-- ... end W-Action -->
</div>
