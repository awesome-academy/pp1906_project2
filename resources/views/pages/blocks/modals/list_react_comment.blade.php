<div class="modal fade edit-comment-modal" id="listReactCommentModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="listReactCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title margin-top-5" id="listReactCommentModalLabel">
                    @lang('Reacts')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="ui-block list-react-comment">
                        @include('pages.blocks.modals.react_user_comment')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
