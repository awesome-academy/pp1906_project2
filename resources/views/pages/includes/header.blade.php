<!-- Header-BP -->

<header class="header" id="site-header">

    <div class="page-title">
        <h6>Newsfeed</h6>
    </div>

    <div class="header-content-wrapper">
        <form class="search-bar w-search notification-list friend-requests">
            <div class="form-group with-button">
                <input class="form-control js-user-search" placeholder="Search peoples..." type="text">
                <button>
                    <img src="{{ asset('socialyte/svg-icons/top_bar/search.svg') }}">
                </button>
            </div>
        </form>

        <a href="#" class="link-find-friend">Find Friends</a>

        <div class="control-block">

            <div class="control-icon more has-items">
                <a href="#" title="Friend requests">
                    <img src="{{ asset('socialyte/svg-icons/top_bar/happy.svg') }}">
                </a>
                <div class="label-avatar bg-blue">6</div>

                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">FRIEND REQUESTS</h6>
                        <a href="#">Find Friends</a>
                        <a href="#">Settings</a>
                    </div>

                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list friend-requests">
                            <li>
                                <div class="author-thumb">
                                    <img src="{{ asset('socialyte/img/avatar55-sm.jpg') }}" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">Tamara Romanoff</a>
                                    <span class="chat-message-item">Sent you a friend request</span>
                                </div>
                                <span class="notification-icon">
                                    <a href="#" class="accept-request">
                                        <span class="icon-add without-text">
                                            <img src="{{ asset('socialyte/svg-icons/top_bar/happy.svg') }}">
                                        </span>
                                    </a>

                                    <a href="#" class="accept-request request-del">
                                        <span class="icon-minus">
                                            <img src="{{ asset('socialyte/svg-icons/top_bar/happy.svg') }}">
                                        </span>
                                    </a>
                                </span>
                            </li>

                            <li class="accepted">
                                <div class="author-thumb">
                                    <img src="{{ asset('socialyte/img/avatar57-sm.jpg') }}" alt="author">
                                </div>
                                <div class="notification-event">
                                    You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">her wall</a>.
                                </div>
                                <span class="notification-icon">
                                    <img src="{{ asset('socialyte/svg-icons/top_bar/friend.svg') }}">
                                </span>
                            </li>
                        </ul>
                    </div>

                    <a href="#" class="view-all bg-blue">View all</a>
                </div>
            </div>

            <div class="control-icon more has-items">
                <a href="#" title="Notifications">
                    <img src="{{ asset('socialyte/svg-icons/top_bar/notify.svg') }}">
                </a>

                <div class="label-avatar bg-primary">8</div>

                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Notifications</h6>
                        <a href="#">Mark all as read</a>
                        <a href="#">Settings</a>
                    </div>

                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list">
                            <li>
                                <div class="author-thumb">
                                    <img src="{{ asset('socialyte/img/avatar62-sm.jpg') }}" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                </div>
                                <span class="notification-icon">
                                    <img src="{{ asset('socialyte/svg-icons/top_bar/comment.svg') }}">
                                </span>
                            </li>

                            <li class="with-comment-photo">
                                <div class="author-thumb">
                                    <img src="{{ asset('socialyte/img/avatar64-sm.jpg') }}" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
                                </div>
                                <span class="notification-icon">
                                    <img src="{{ asset('socialyte/svg-icons/top_bar/comment.svg') }}">
                                </span>

                                <div class="comment-photo">
                                    <img src="{{ asset('socialyte/img/comment-photo1.jpg') }}" alt="photo">
                                    <span>“She looks incredible in that outfit! We should see each...”</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <a href="#" class="view-all bg-primary">View All</a>
                </div>
            </div>

            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img alt="author" src="{{ asset('socialyte/img/author-page.jpg') }}" class="avatar">
                    <span class="icon-status online"></span>
                </div>
                <a href="#" class="author-name fn">
                    <div class="author-title">
                        James Spiegel
                    </div>
                    <span class="author-subtitle">SPACE COWBOY</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- ... end Header-BP -->
<div class="header-spacer"></div>
