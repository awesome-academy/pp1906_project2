<li class="comment-item comment-item-{{ $comment->id }}" >
    <div class="post__author author vcard inline-items">
        <img src="{{ getAvatar($comment->user->avatar) }}"  alt="{{ auth()->user()->name }}">

        <div class="author-date">
            <a class="h6 post__author-name fn" href="02-ProfilePage.html">{{ $comment->user->name }}</a>
            <div class="post__date">
                <time class="published" datetime="2004-07-24T18:18">{{ getCreatedFromTime($comment) }}</time>
            </div>
        </div>
        @include('pages.blocks.widgets.three_dots_comment')
    </div>

    <p class="comment-content-{{ $comment->id }}">{{ $comment->content ?? ''}}</p>

    @include('pages.blocks.widgets.comment_reacts_list', ['comment' => $comment])
</li>
