<ul class="comments-list">
    @foreach ($post->comments->sortByDesc('created_at')->take(1) as $comment)
        @include('pages.blocks.comment', ['comment' => $comment])
    @endforeach
</ul>
