<!-- Header-BP -->

<header class="header" id="site-header">

    <div class="page-title">
        <h6> @lang('Newsfeed') </h6>
    </div>

    <div class="header-content-wrapper">
        <div class="search-bar w-search notification-list friend-requests">
            <div class="form-group with-button">
                <input class="form-control search-people-input dropdown-toggle" name="name" placeholder="@lang('Search peoples...')" type="text" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" autocomplete="new-password">

                <div class="selectize-dropdown multi form-control dropdown-menu search-people-result" aria-labelledby="searchPeople">
                </div>

            </div>
        </div>

        <div class="control-block">
            @include('pages.blocks.widgets.friend_requests')

            @include('pages.blocks.widgets.notifications')
            <a href="{{ route('user.profile', auth()->user()->username) }}">
                <div class="author-page author vcard inline-items more">
                    <div class="author-thumb">
                        <img src="{{ getAvatar(auth()->user()->avatar) }}" class="avatar default-avatar" alt="{{auth()->user()->name}}">
                        <span class="icon-status online"></span>
                    </div>
                    <a href="{{ route('user.profile', auth()->user()->username) }}" class="author-name fn">
                        <div class="author-title">
                            {{ auth()->user()->name }}
                        </div>
                        <span class="author-subtitle">{{ auth()->user()->username }}</span>
                    </a>
                </div>
            </a>
        </div>
    </div>
</header>

<!-- ... end Header-BP -->
<div class="header-spacer">
</div>
