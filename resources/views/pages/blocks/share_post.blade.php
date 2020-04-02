<div class="ui-block">
    <!-- Post -->

    <article class="hentry post has-post-thumbnail shared-photo">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('socialyte/img/author-page.jpg') }}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a> shared
                <a href="#">Diana Jameson</a>’s <a href="#">photo</a>
                <div class="post__date">
                    <time class="published" datetime="2017-03-24T18:18">
                        7 hours ago
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

        <p>Hi! Everyone should check out these amazing photographs that my friend shot the past week. Here’s one of them...leave a kind comment!</p>

        <div class="post-thumb">
            <img src="{{ asset('socialyte/img/post-photo6.jpg') }}" alt="photo">
        </div>

        <ul class="children single-children">
            <li class="comment-item">
                <div class="post__author author vcard inline-items">
                    <img src="{{ asset('socialyte/img/avatar8-sm.jpg') }}" alt="author">
                    <div class="author-date">
                        <a class="h6 post__author-name fn" href="#">Diana Jameson</a>
                        <div class="post__date">
                            <time class="published" datetime="2017-03-24T18:18">
                                16 hours ago
                            </time>
                        </div>
                    </div>
                </div>

                <p>Here’s the first photo of our incredible photoshoot from yesterday. If you like it please say so and tel me what you wanna see next!</p>
            </li>
        </ul>

        @include('pages.blocks.widgets.reacts_list')
        @include('pages.blocks.widgets.reacts')
    </article>

    <!-- .. end Post -->
</div>
