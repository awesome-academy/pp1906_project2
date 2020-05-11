<li class="comment-item comment-item-{{ $comment->id }} @if ($comment->replies()->count()) has-children @endif">
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

    <p class="comment-content-{{ $comment->id }}">{{ $comment->content ?? ''}}</p>

    @include('pages.blocks.widgets.comment_reacts_list', ['comment' => $comment])

    <ul class="children parent-comment-{{ $comment->getOriginalParent() }}">
        @if ($comment->replies()->count() && $comment->isOriginalParent())
        @include('pages.blocks.widgets.comment_reply')
        @endif
    </ul>

    <form class="comment-form reply-form inline-items display-none comment-{{ $comment->id }}" data-parent-comment-id="{{ $comment->getOriginalParent() }}" data-comment-id="{{ $comment->id }}" data-post-id="{{ $comment->post->id }}">
        <div class="post__author author vcard inline-items">
            <img src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">

            <div class="form-group with-icon-right reply-form-group">
                <textarea class="form-control reply-content with-prefix comment-{{ $comment->id }}" data-prefix="{{ $comment->user->name }}"></textarea>
            </div>
        </div>
    </form>
</li>
