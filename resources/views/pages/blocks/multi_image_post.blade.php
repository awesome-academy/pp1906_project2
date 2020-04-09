<div class="ui-block">

    <!-- Post -->

    <article class="hentry post">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('theme/socialyte/img/avatar47-sm.jpg') }}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="#">Blue Whale Pizzas</a> uploaded 16 <a href="#">new photos</a>
                <div class="post__date">
                    <time class="published" datetime="2017-03-24T18:18">
                        7 hours ago
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

        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia erunt mollit anim id
            est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
        </p>

        <div class="post-block-photo js-zoom-gallery">
            <a href="{{ asset('theme/socialyte/img/post-photo7.jpg') }}" class="half-width"><img src="{{ asset('theme/socialyte/img/post-photo7.jpg') }}" alt="photo"></a>
            <a href="{{ asset('theme/socialyte/img/post-photo2.jpg') }}" class="half-width"><img src="{{ asset('theme/socialyte/img/post-photo2.jpg') }}" alt="photo"></a>
            <a href="{{ asset('theme/socialyte/img/post-photo3.jpg') }}" class="col col-3-width"><img src="{{ asset('theme/socialyte/img/post-photo3.jpg') }}" alt="photo"></a>
            <a href="{{ asset('theme/socialyte/img/post-photo4.jpg') }}" class="col col-3-width"><img src="{{ asset('theme/socialyte/img/post-photo4.jpg') }}" alt="photo"></a>
            <a href="{{ asset('theme/socialyte/img/post-photo5.jpg') }}" class="more-photos col-3-width">
                <img src="{{ asset('theme/socialyte/img/post-photo5.jpg') }}" alt="photo">
                <span class="h2">+12</span>
            </a>
        </div>

        @include('pages.blocks.widgets.reacts_list')
        @include('pages.blocks.widgets.reacts')

    </article>

    <!-- ... end Post -->
</div>
