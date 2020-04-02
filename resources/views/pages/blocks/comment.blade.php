<!-- Comments -->
<ul class="comments-list">
    <li class="comment-item">
        <div class="post__author author vcard inline-items">
            <img src="{{ asset('socialyte/img/author-page.jpg') }}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
                <div class="post__date">
                    <time class="published" datetime="2004-07-24T18:18">
                        38 mins ago
                    </time>
                </div>
            </div>

            @include('pages.blocks.widgets.three_dots')

        </div>

        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

        @include('pages.blocks.widgets.comment_reacts_list')
    </li>

    <li class="comment-item">
        <div class="post__author author vcard inline-items">
            <img src="{{ asset('socialyte/img/avatar1-sm.jpg') }}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="#">Mathilda Brinker</a>
                <div class="post__date">
                    <time class="published" datetime="2004-07-24T18:18">
                        1 hour ago
                    </time>
                </div>
            </div>

            @include('pages.blocks.widgets.three_dots')

        </div>

        <p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum
            quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
        </p>

        @include('pages.blocks.widgets.comment_reacts_list')
    </li>
</ul>
