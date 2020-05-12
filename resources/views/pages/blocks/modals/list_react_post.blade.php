<div class="modal fade edit-post-modal" id="listReactModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="listReactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title margin-top-5" id="listReactModalLabel">
                    @lang('Reacts')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="ui-block list-react-post">
                        @include('pages.blocks.modals.react_user')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
