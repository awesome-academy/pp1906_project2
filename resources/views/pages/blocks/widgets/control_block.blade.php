<div class="control-block-button">
    @if( $user->isCurrentUser() )
    <div class="btn btn-control bg-primary more">
        <a href="#"><img src="{{ asset('socialyte/svg-icons/top/settings.svg') }}"></a>
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
    <a href="#" class="btn btn-control bg-blue" title="@lang('Add friend')">
        <img src="{{ asset('socialyte/svg-icons/top/add_friend.svg') }}">
    </a>

    <a href="#" class="btn btn-control bg-green" title="@lang('Follow')">
        <img src="{{ asset('socialyte/svg-icons/top/follow.svg') }}">
    </a>

    <a href="#" class="btn btn-control bg-grey" title="@lang('Block this user')">
        <img src="{{ asset('socialyte/svg-icons/top/block.svg') }}">
    </a>
    @endif
</div>
