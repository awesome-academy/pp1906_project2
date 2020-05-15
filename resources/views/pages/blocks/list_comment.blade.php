@if (!isset($moreComments))
    @if ($post->allComments()->count() > config('post.comment.max'))
        @include('pages.blocks.comment', ['comment' => $lastParentComment])
    @else
        @foreach ($post->parentComments as $comment)
            @include('pages.blocks.comment', ['comment' => $comment])
        @endforeach
    @endif
@else
    @foreach ($moreComments as $comment)
        @include('pages.blocks.comment', ['comment' => $comment])
    @endforeach
@endif

