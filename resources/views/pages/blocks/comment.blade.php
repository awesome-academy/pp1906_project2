<li class="comment-item">
    <div class="post__author author vcard inline-items">
        <img src="{{ asset('theme/socialyte/img/author-page.jpg') }}" alt="author">

        <div class="author-date">
            <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
            <div class="post__date">
                <time class="published" datetime="2004-07-24T18:18">
                    38 mins ago
                </time>
            </div>
        </div>

        {{-- @include('pages.blocks.widgets.three_dots') --}}
    </div>
    <p>{{ $comment->content }}</p>

    @include('pages.blocks.widgets.comment_reacts_list')
</li>

