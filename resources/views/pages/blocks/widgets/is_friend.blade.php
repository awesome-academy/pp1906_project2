<div class="btn btn-control bg-green more is-friend">
    <a href="#"><img src="{{ asset('theme/socialyte/svg-icons/top/is_friend.svg') }}"></a>
    <ul class="more-dropdown more-with-triangle triangle-bottom-right">
        <li>
            <a href="#" class="un-friend" data-friend-name="{{ $user->username }}" data-friend-id="{{ $user->id }}">@lang('Unfriend')</a>
        </li>
    </ul>
</div>
