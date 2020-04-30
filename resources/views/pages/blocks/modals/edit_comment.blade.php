<div class="modal fade edit-comment-modal" id="editCommentModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title margin-top-5" id="editPostModalLabel">
                    <img class="options-message" src="{{ asset('theme/socialyte/svg-icons/center/edit.svg') }}">
                    @lang('Edit your comment')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ui-block">
                    <div class="news-feed-form single-post">
                        <div class="tab-content">
                            <div class="author-thumb">
                                <img class="avatar default-avatar" src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group with-icon label-floating is-empty">
                                <label class="control-label error-content" hidden style="color: red"><u><b>@lang('The content is not empty!') </b></u></label>
                                <textarea required="" class="form-control edit-comment-content @error('content') is-invalid @enderror" name="content" placeholder="">{{ $comment->content }}</textarea>
                            </div>

                            <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="@lang('ADD PHOTOS')">
                                    <img data-toggle="modal" data-target="#update-header-photo" src="{{ asset('theme/socialyte/svg-icons/center/camera.svg') }}">
                                </a>
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="@lang('TAG YOUR FRIENDS')">
                                    <img src="{{ asset('theme/socialyte/svg-icons/center/tag.svg') }}">
                                </a>
                                <button type="submit" class="btn btn-primary btn-md-2 save-edit-comment"

                                data-post_id="{{ isset($postId) ? $postId : $post->id }}" data-comment_id={{ $comment->id }}> @lang('Accept Changes')
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
