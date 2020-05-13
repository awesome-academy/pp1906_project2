@extends('pages.profile.profile_master')

@section('profile_content')
@include('pages.profile.friends.title')
<!-- Friends -->
<div class="container">
    <div class="row search-friend-result">
        @if ($userFriends->count() > 0)
            @include('pages.blocks.widgets.friend_list_block')
        @else
            <div class="mCustomScrollbar align-center" data-mcs-theme="dark">
                <li class="nothing-here-wrapper nothing-here-notification nothing-here-friends">
                    <div class="notification-event">
                        <h6 class="nothing-here">@lang('You have no friend..')<h6>
                    </div>
                </li>
            </div>
        @endif
    </div>
</div>

<!-- ... end Friends -->
@endsection

@section('script')
<script src="{{ asset('js/search_friend.js') }}"></script>
@endsection
