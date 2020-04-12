<div class="btn btn-control bg-primary more requesting">
    <a href="#"><img src="{{ asset('theme/socialyte/svg-icons/top/friend_request.svg') }}"></a>
    <ul class="more-dropdown more-with-triangle triangle-bottom-right">
        <li>
            <a href="#" class="accept" data-friend-name="{{ $user->username }}" data-friend-id="{{ $user->id }}">@lang('Accept friend request')</a>
        </li>
        <li>
            <a href="#" class="reject" data-friend-name="{{ $user->username }}" data-friend-id="{{ $user->id }}">@lang('Decline friend request')</a>
        </li>
    </ul>
</div>
