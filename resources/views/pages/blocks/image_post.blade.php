<div class="ui-block">

    <article class="hentry post has-post-thumbnail">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('theme/socialyte/img/avatar5-sm.jpg') }}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
                <div class="post__date">
                    <time class="published" datetime="2004-07-24T18:18">
                        March 8 at 6:42pm
                    </time>
                </div>
            </div>

            <div class="more">
                <a href="#" class="olymp-three-dots-icon">
                    <img src="{{ asset('theme/socialyte/svg-icons/center/three-dots.svg') }}">
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

        <p>Hey guys! We are gona be playing this Saturday of <a href="#">The Marina Bar</a> for their new Mystic Deer Party.
            If you wanna hang out and have a really good time, come and join us. We’l be waiting for you!
        </p>

        <div class="post-thumb">
            <img src="{{ asset('theme/socialyte/img/post__thumb1.jpg') }}" alt="photo">
        </div>

        @include('pages.blocks.widgets.reacts_list')
        @include('pages.blocks.widgets.reacts')

    </article>
</div>
