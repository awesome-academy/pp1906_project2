<div class="ui-block">

    <article class="hentry post">

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

            @include('pages.blocks.widgets.three_dots')
        </div>

        <p>
            {{ $post->content }}
        </p>
        @include('pages.blocks.widgets.reacts_list')

        @include('pages.blocks.widgets.reacts')

    </article>

    <!-- ... end Comments -->

    <a href="#" class="more-comments"> @lang('View more comments') <span>+</span></a>


    <!-- Comment Form  -->

    <form class="comment-form inline-items">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('theme/socialyte/img/author-page.jpg') }}" alt="author">

            <div class="form-group with-icon-right ">
                <textarea class="form-control" placeholder=""></textarea>
                <div class="add-options-message">
                    <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                        <svg class="olymp-camera-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <button class="btn btn-md-2 btn-primary"> @lang('Post Comment') </button>

        <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color"> @lang('Cancel') </button>

    </form>

    <!-- ... end Comment Form  -->
</div>
