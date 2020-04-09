<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Notifications</h6>
            <a href="#" class="mark-all">
                <h6>Mark all as read</h6>
            </a>
        </div>


        <!-- Notification List -->

        <ul class="notification-list">
            <li class="un-read">
                <div class="author-thumb">
                    <img src="{{ asset('theme/socialyte/img/avatar1-sm.jpg') }}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                </div>
                <span class="notification-icon">
                    <img src="{{ asset('theme/socialyte/svg-icons/center/commented.svg') }}">
                </span>
            </li>

            <li class="with-comment-photo">
                <div class="author-thumb">
                    <img src="{{ asset('theme/socialyte/img/avatar3-sm.jpg') }}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
                </div>
                <span class="notification-icon">
                    <img src="{{ asset('theme/socialyte/svg-icons/center/commented.svg') }}">
                </span>

                <div class="comment-photo">
                    <img src="{{ asset('theme/socialyte/img/comment-photo.jpg') }}" alt="photo">
                    <span>“She looks incredible in that outfit! We should see each...”</span>
                </div>
            </li>
            <li>
                <div class="author-thumb">
                    <img src="{{ asset('theme/socialyte/img/avatar4-sm.jpg') }}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">Chris Greyson</a> liked your <a href="#" class="notification-link">profile status</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 18th at 8:22pm</time></span>
                </div>
                <span class="notification-icon">
                    <img src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
                </span>
            </li>

            <li>
                <div class="author-thumb">
                    <img src="{{ asset('theme/socialyte/img/avatar6-sm.jpg') }}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
                </div>
                <span class="notification-icon">
                    <img src="{{ asset('theme/socialyte/svg-icons/center/commented.svg') }}">
                </span>
            </li>

            <li>
                <div class="author-thumb">
                    <img src="{{ asset('theme/socialyte/img/avatar7-sm.jpg') }}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">Marina Valentine</a> commented on your new <a href="#" class="notification-link">profile status</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 10:07am</time></span>
                </div>
                <span class="notification-icon">
                    <img src="{{ asset('theme/socialyte/svg-icons/center/commented.svg') }}">
                </span>
            </li>
        </ul>

        <!-- ... end Notification List -->

    </div>


    <!-- Pagination -->

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1<div class="ripple-container">
                        <div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div>
                    </div></a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">12</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

    <!-- ... end Pagination -->

</div>
