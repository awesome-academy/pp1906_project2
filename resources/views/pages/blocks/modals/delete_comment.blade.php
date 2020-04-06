<div class="modal fade" id="confirmDeleteCommentModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title margin-top-5" id="confirmDeleteCommentModalLabel">@lang('Remove comment')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @lang('Are you sure?. This comment will be deleted and you won\'t be able to find it anymore.')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('Cancel')</button>
                <form method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">@lang('Delete this comment')</button>
                </form>
            </div>
        </div>
    </div>
</div>
