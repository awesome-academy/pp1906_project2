<li class="comment-item comment-item-{{ $comment->id }}">
    <div class="post__author author vcard inline-items">
        <img src="{{ getAvatar($comment->user->avatar) }}" alt="{{ $comment->user->name }}">

        <div class="author-date">
            <a class="h6 post__author-name fn" href="{{ route('user.profile', $comment->user->username) }}">{{ $comment->user->name }}</a>
            <div class="post__date">
                <time class="published" datetime="2004-07-24T18:18">{{ getCreatedFromTime($comment) }}</time>
            </div>
        </div>
        @if (auth()->id() == $comment->user->id)
            @include('pages.blocks.widgets.three_dots_comment')
        @endif
    </div>

    <p class="comment-content-{{ $comment->id }}">
        @if (!$comment->parent->isOriginalParent())
        <a class="h6 post__author-name fn reply__author-name" href="{{ route('user.profile', $comment->parent->user->username) }}">{{ $comment->parent->user->name }}
        </a>
        @endif
        {{ $comment->content ?? ''}}
    </p>

    @include('pages.blocks.widgets.comment_reacts_list', ['comment' => $comment])
</li>
