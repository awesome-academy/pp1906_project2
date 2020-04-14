<ul class="comments-list">
    @foreach ($post->comments as $comment)
    @include('pages.blocks.comment', ['comment' => $comment])
    @endforeach
</ul>
