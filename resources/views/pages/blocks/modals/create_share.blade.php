<div class="modal fade edit-post-modal" id="sharePostModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="sharePostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title margin-top-5" id="sharePostModalLabel">
                    <img class="options-message" src="{{ asset('theme/socialyte/svg-icons/center/edit.svg') }}">
                    @lang('Share post')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="ui-block">
                    <div class="news-feed-form single-post">
                        <div class="tab-content">
                            <form method="POST" action="{{ route('posts.share', $post->id) }}">
                                @csrf
                                <div class="author-thumb">
                                    <img class="avatar" src="{{ asset('theme/socialyte/img/author-page.jpg') }}" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder=""></textarea>

                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="@lang('TAG YOUR FRIENDS')">
                                        <img src="{{ asset('theme/socialyte/svg-icons/center/tag.svg') }}">
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-md-2"> @lang('Share') </button>
                                    <div class="form-group post-type">
                                        <select class="selectpicker form-control" name="type">
                                            <option value="{{ config('post.type.public') }}" selected="selected"> @lang('Public') </option>
                                            <option value="{{ config('post.type.private') }}"> @lang('Private') </option>
                                            <option value="{{ config('post.type.only_friends') }}"> @lang('Only Friends') </option>
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <article class="post-share">

                    <div class="post__author author vcard inline-items">
                        <img src="{{ asset('theme/socialyte/img/avatar10-sm.jpg') }}" alt="author">

                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#">{{ $post->user->name }}</a>
                            <div class="post-type-icon post__date">
                                <a class="show-post" href="{{ route('posts.show', $post->id) }}">
                                    <time class="published" datetime="2004-07-24T18:18">{{ getCreatedFromTime($post) }}</time>

                                    @if ($post->isUpdated())
                                    <span>
                                        (@lang('updated')
                                        <time class="published" datetime="2004-07-24T18:18">{{ getUpdatedFromTime($post) }}</time>)
                                    </span>
                                    @endif
                                </a>

                                <span> · </span>

                                @if ($post->isPublic())
                                <img class="post-type" src="{{ asset('theme/socialyte/svg-icons/center/public.svg') }}" title="@lang('Public')">
                                @elseif ($post->isPrivate())
                                <img class="post-type" src="{{ asset('theme/socialyte/svg-icons/center/private.svg') }}" title="@lang('Private')">
                                @elseif ($post->isFriendsOnly())
                                <img class="post-type" src="{{ asset('theme/socialyte/svg-icons/center/only_friends.svg') }}" title="@lang('Only Friends')">
                                @endif
                            </div>
                        </div>

                    </div>

                    <p>
                        {{ $post->content }}
                    </p>
                </article>

            </div>



        </div>
    </div>
</div>
