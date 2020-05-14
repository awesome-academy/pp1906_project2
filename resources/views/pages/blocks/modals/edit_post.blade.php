<div class="modal fade edit-post-modal" id="editPostModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true" data-post-id="{{ $post->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title margin-top-5" id="editPostModalLabel">
                    <img class="options-message" src="{{ asset('theme/socialyte/svg-icons/center/edit.svg') }}">
                    @lang('Edit your post')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ui-block">
                    <div class="news-feed-form single-post">
                        <div class="tab-content">
                            <form method="POST" class="edit-post-form" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="author-thumb">
                                    <img class="avatar default-avatar" src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <textarea class="edit-post-textarea form-control @error('content') is-invalid @enderror" name="content" placeholder="">{{ $post->content }}</textarea>

                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div id="image-holder" class="edit-image edit-image-holder post-{{ $post->id }}">
                                    @include('pages.blocks.modals.edit_image_block')
                                </div>
                                <div class="add-options-message edit-image-message">
                                    <a href="#" class="options-message edit-image-message" data-toggle="tooltip" data-placement="top" data-original-title="@lang('ADD PHOTOS')" data-post-id="{{ $post->id }}">
                                        <label class="display-inline">
                                            <img src="{{ asset('theme/socialyte/svg-icons/center/camera.svg') }}">
                                            <input class="edit-image-input post-{{ $post->id }} form-control @error('image') is-invalid @enderror display-none" data-post-id="{{ $post->id }}" type="file" name="image[]" accept="image/*" multiple>
                                        </label>
                                    </a>
                                    <a href="#" class="remove-image display-none post-{{ $post->id }}" data-post-id="{{ $post->id }}" data-toggle="tooltip" title="@lang('REMOVE ALL IMAGES')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-md-2 edit-post-button"> @lang('Accept Changes') </button>

                                    @error('image.*')
                                    <span class="image-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
