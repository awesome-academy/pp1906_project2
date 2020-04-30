<!-- Header-BP -->

<header class="header" id="site-header">

    <div class="page-title">
        <h6> @lang('Newsfeed') </h6>
    </div>

    <div class="header-content-wrapper">
        <form class="search-bar w-search notification-list friend-requests">
            <div class="form-group with-button">
                <input class="form-control js-user-search" placeholder="Search peoples..." type="text">
                <button>
                    <img src="{{ asset('theme/socialyte/svg-icons/top_bar/search.svg') }}">
                </button>
            </div>
        </form>

        <a href="#" class="link-find-friend"> @lang('Find Friends') </a>

        <div class="control-block">
            @include('pages.blocks.widgets.friend_requests')

            @include('pages.blocks.widgets.notifications')

            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img src="{{ getAvatar(auth()->user()->avatar) }}" class="avatar default-avatar" alt="{{auth()->user()->name}}">
                    <span class="icon-status online"></span>
                </div>
                <a href="#" class="author-name fn">
                    <div class="author-title">
                        {{ auth()->user()->name }}
                    </div>
                    <span class="author-subtitle">{{ auth()->user()->username }}</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- ... end Header-BP -->
<div class="header-spacer">
</div>
