<div class="ui-block">
    <!-- Post -->

    <article class="hentry post">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('socialyte/img/author-page.jpg') }}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
                <div class="post__date">
                    <time class="published" datetime="2017-03-24T18:18">
                        2 hours ago
                    </time>
                </div>
            </div>

            <div class="more">
                <a href="#" class="olymp-three-dots-icon">
                    <img src="{{ asset('socialyte/svg-icons/center/three-dots.svg') }}">
                </a>
                <ul class="more-dropdown">
                    <li>
                        <a href="#">Edit Post</a>
                    </li>
                    <li>
                        <a href="#">Delete Post</a>
                    </li>
                </ul>
            </div>

        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris consequat.
        </p>

        @include('pages.blocks.widgets.reacts_list')
        @include('pages.blocks.widgets.reacts')
    </article>

    <!-- .. end Post -->
    <!-- Comments -->

    <ul class="comments-list">
        <li class="comment-item">
            <div class="post__author author vcard inline-items">
                <img src="{{ asset('socialyte/img/avatar10-sm.jpg') }}" alt="author">

                <div class="author-date">
                    <a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
                    <div class="post__date">
                        <time class="published" datetime="2017-03-24T18:18">
                            5 mins ago
                        </time>
                    </div>
                </div>

                <div class="more">
                    <a href="#" class="olymp-three-dots-icon">
                        <img src="{{ asset('socialyte/svg-icons/center/three-dots.svg') }}">
                    </a>
                    <ul class="more-dropdown">
                        <li>
                            <a href="#">Edit Post</a>
                        </li>
                        <li>
                            <a href="#">Delete Post</a>
                        </li>
                    </ul>
                </div>
            </div>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

            @include('pages.blocks.widgets.comment_reacts_list')
        </li>
        <li class="comment-item has-children">
            <div class="post__author author vcard inline-items">
                <img src="{{ asset('socialyte/img/avatar5-sm.jpg') }}" alt="author">

                <div class="author-date">
                    <a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
                    <div class="post__date">
                        <time class="published" datetime="2017-03-24T18:18">
                            1 hour ago
                        </time>
                    </div>
                </div>

                <div class="more">
                    <a href="#" class="olymp-three-dots-icon">
                        <img src="{{ asset('socialyte/svg-icons/center/three-dots.svg') }}">
                    </a>
                    <ul class="more-dropdown">
                        <li>
                            <a href="#">Edit Post</a>
                        </li>
                        <li>
                            <a href="#">Delete Post</a>
                        </li>
                    </ul>
                </div>

            </div>

            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi en lod nesciunt. Neque porro
                quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum der.
            </p>

            @include('pages.blocks.widgets.comment_reacts_list')

            <ul class="children">
                <li class="comment-item">
                    <div class="post__author author vcard inline-items">
                        <img src="{{ asset('socialyte/img/avatar8-sm.jpg') }}" alt="author">

                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#">Diana Jameson</a>
                            <div class="post__date">
                                <time class="published" datetime="2017-03-24T18:18">
                                    39 mins ago
                                </time>
                            </div>
                        </div>

                        <div class="more">
                            <a href="#" class="olymp-three-dots-icon">
                                <img src="{{ asset('socialyte/svg-icons/center/three-dots.svg') }}">
                            </a>
                            <ul class="more-dropdown">
                                <li>
                                    <a href="#">Edit Post</a>
                                </li>
                                <li>
                                    <a href="#">Delete Post</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                    @include('pages.blocks.widgets.comment_reacts_list')
                </li>
                <li class="comment-item">
                    <div class="post__author author vcard inline-items">
                        <img src="{{ asset('socialyte/img/avatar2-sm.jpg') }}" alt="author">

                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#">Nicholas Grisom</a>
                            <div class="post__date">
                                <time class="published" datetime="2017-03-24T18:18">
                                    24 mins ago
                                </time>
                            </div>
                        </div>

                        <div class="more">
                            <a href="#" class="olymp-three-dots-icon">
                                <img src="{{ asset('socialyte/svg-icons/center/three-dots.svg') }}">
                            </a>
                            <ul class="more-dropdown">
                                <li>
                                    <a href="#">Edit Post</a>
                                </li>
                                <li>
                                    <a href="#">Delete Post</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <p>Excepteur sint occaecat cupidatat non proident.</p>

                    @include('pages.blocks.widgets.comment_reacts_list')

                </li>
            </ul>

        </li>

        <li class="comment-item">
            <div class="post__author author vcard inline-items">
                <img src="{{ asset('socialyte/img/avatar4-sm.jpg') }}" alt="author">

                <div class="author-date">
                    <a class="h6 post__author-name fn" href="#">Chris Greyson</a>
                    <div class="post__date">
                        <time class="published" datetime="2017-03-24T18:18">
                            1 hour ago
                        </time>
                    </div>
                </div>

                <div class="more">
                    <a href="#" class="olymp-three-dots-icon">
                        <img src="{{ asset('socialyte/svg-icons/center/three-dots.svg') }}">
                    </a>
                    <ul class="more-dropdown">
                        <li>
                            <a href="#">Edit Post</a>
                        </li>
                        <li>
                            <a href="#">Delete Post</a>
                        </li>
                    </ul>
                </div>

            </div>

            <p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>

            @include('pages.blocks.widgets.comment_reacts_list')

        </li>
    </ul>

    <!-- ... end Comments -->
    <a href="#" class="more-comments">View more comments <span>+</span></a>

    <!-- Comment Form  -->

    <form class="comment-form inline-items">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('socialyte/img/author-page.jpg') }}" alt="author">

            <div class="form-group with-icon-right ">
                <textarea class="form-control" placeholder=""></textarea>
                <div class="add-options-message">
                    <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                        <svg class="olymp-camera-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <button class="btn btn-md-2 btn-primary">Post Comment</button>

        <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>

    </form>

    <!-- ... end Comment Form  -->
</div>
