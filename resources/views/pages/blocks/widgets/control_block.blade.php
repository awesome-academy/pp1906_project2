<div class="control-block-button">
    @if( $user->isCurrentUser() )
    <div class="btn btn-control bg-primary more">
        <a href="#"><img src="{{ asset('theme/socialyte/svg-icons/top/settings.svg') }}"></a>
        <ul class="more-dropdown more-with-triangle triangle-bottom-right">
            <li>
                <a href="#" data-toggle="modal" data-target="#update-header-avatar">@lang('Update Profile Photo')</a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#update-header-cover">@lang('Update Cover Photo')</a>
            </li>
            <li>
                <a href="{{ route('user.showInformation') }}">@lang('Account Settings')</a>
            </li>
        </ul>
    </div>
    @else

    <span class="friend-icon">
        @if ($relationship)
            @if ($relationship->status == config('user.friend.request'))
                @if ($relationship->friend_id == $user->id)
                    @include('pages.blocks.widgets.un_request')
                @else
                    @include('pages.blocks.widgets.requesting')
                @endif
            @elseif ($relationship->status == config('user.friend.accept'))
                @include('pages.blocks.widgets.is_friend')
            @endif
        @else
            @include('pages.blocks.widgets.add_friend')
        @endif
    </span>

    <a href="#" class="btn btn-control bg-purple" title="@lang('Follow')">
        <img src="{{ asset('theme/socialyte/svg-icons/top/follow.svg') }}">
    </a>

    <a href="#" class="btn btn-control bg-grey" title="@lang('Block this user')">
        <img src="{{ asset('theme/socialyte/svg-icons/top/block.svg') }}">
    </a>
    @endif
</div>
