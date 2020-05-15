<div class="modal fade" id="shareUsersModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="shareUsersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title margin-top-5" id="shareUsersModalLabel">
                    @lang('Shares')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="ui-block">
                        <!-- Birthday Item -->
                        @foreach($post->shares as $postShare)
                        <div class="birthday-item inline-items">
                            <div class="author-thumb">
                                <img src="{{ getAvatar($post->user->avatar) }}" class="default-avatar" alt="{{ $post->user->name }}">
                            </div>
                            <div class="birthday-author-name">
                                <a href="{{ route('user.profile', $postShare->user->username) }}" class="h6 author-name">{{ $postShare->user->name }}</a>
                                <div class="birthday-date"> <time class="published">{{ getCreatedFromTime($postShare) }}</time></div>
                            </div>
                            <a href="{{ route('posts.show', $postShare->id) }}" class="btn btn-sm bg-blue">@lang('Show post')</a>
                        </div>
                        @endforeach
                        <!-- ... end Birthday Item -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
