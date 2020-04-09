<div class="control-block-button">
    @if( $user->isCurrentUser() )
    <div class="btn btn-control bg-primary more">
        <a href="#"><img src="{{ asset('theme/socialyte/svg-icons/top/settings.svg') }}"></a>
        <ul class="more-dropdown more-with-triangle triangle-bottom-right">
            <li>
                <a href="#" data-toggle="modal" data-target="#update-header-photo">@lang('Update Profile Photo')</a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#update-header-photo">@lang('Update Cover Photo')</a>
            </li>
            <li>
                <a href="{{ route('user.showInformation') }}">@lang('Account Settings')</a>
            </li>
        </ul>
    </div>
    @else

    <span class="friend-icon">
        @if ($checkFriends)
            @include('pages.blocks.widgets.un_friend')
        @else
            @include('pages.blocks.widgets.add_friend')
        @endif
    </span>

    <a href="#" class="btn btn-control bg-green" title="@lang('Follow')">
        <img src="{{ asset('theme/socialyte/svg-icons/top/follow.svg') }}">
    </a>

    <a href="#" class="btn btn-control bg-grey" title="@lang('Block this user')">
        <img src="{{ asset('theme/socialyte/svg-icons/top/block.svg') }}">
    </a>
    @endif
</div>
