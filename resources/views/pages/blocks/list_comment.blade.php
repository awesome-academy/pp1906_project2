<ul class="comments-list">
    @foreach ($post->parentComments as $comment)
    @include('pages.blocks.comment', ['comment' => $comment])
    @endforeach
</ul>
