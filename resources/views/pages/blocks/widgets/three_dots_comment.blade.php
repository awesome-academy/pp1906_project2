<div class="more">
    <a href="#" class="olymp-three-dots-icon">
        <img src="{{ asset('/theme/socialyte/svg-icons/center/three-dots.svg') }}">
    </a>
    <ul class="more-dropdown width-100">
        <li>
            <a href="#" data-toggle="modal" data-target="#editCommentModal{{ $comment->id }}">@lang('Edit')</a>
        </li>
        <li>
            <a href="#" data-toggle="modal" data-target="#confirmDeleteCommentModal{{ $comment->id }}">@lang('Delete')</a>
        </li>
    </ul>
    @include('pages.blocks.modals.edit_comment')
</div>
