<div class="ui-block">

    <article class="hentry post">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('theme/socialyte/img/avatar10-sm.jpg') }}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="{{ route('user.profile', $post->user->username) }}">{{ $post->user->name }}</a>

                @if ($post->share)

                {!! __('share.title', ['name' => $post->share->user->name, 'username' => $post->share->user->username, 'post_id' => $post->share->id]) !!}

                @endif

                <div class="post-type-icon post__date">
                    <a class="show-post float-left" href="{{ route('posts.show', $post->id) }}">
                        <time class="published">{{ getCreatedFromTime($post) }}</time>

                        @if ($post->isUpdated())
                        <span>
                            (@lang('updated')
                            <time class="published">{{ getUpdatedFromTime($post) }}</time>)
                        </span>
                        @endif
                    </a>
                </div>
            </div>

            @include('pages.blocks.widgets.three_dots')
        </div>

        <p>
            {{ $post->content }}
        </p>

        @if ($post->image)
        @include('pages.blocks.widgets.post_image')
        @endif

        @if ($post->share)
        @include('pages.blocks.widgets.share', ['post' => $post->share])
        @endif
        @include('pages.blocks.widgets.reacts_list')

        @include('pages.blocks.widgets.reacts')

    </article>

    @include('pages.blocks.list_comment')

    <!-- ... end Comments -->

    <a href="#" class="more-comments"> @lang('View more comments') <span>+</span></a>


    <!-- Comment Form  -->

    <form class="comment-form inline-items">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('theme/socialyte/img/author-page.jpg') }}" alt="author">

            <div class="form-group with-icon-right ">
                <textarea class="form-control comment-content" placeholder=""></textarea>
                <div class="add-options-message">
                    <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                        <svg class="olymp-camera-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <button class="btn btn-md-2 btn-primary store-comment" data-post_id="{{ $post->id }}"> @lang('Post Comment') </button>

    </form>

    <!-- ... end Comment Form  -->
</div>
