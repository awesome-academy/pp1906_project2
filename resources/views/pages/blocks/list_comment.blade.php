@foreach ($comments as $comment)
    @include('pages.blocks.comment', ['comment' => $comment])
@endforeach
