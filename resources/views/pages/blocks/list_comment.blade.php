@foreach ($post->comments->sortByDesc('created_at') as $comment)
    @include('pages.blocks.comment', ['comment' => $comment])
@endforeach
