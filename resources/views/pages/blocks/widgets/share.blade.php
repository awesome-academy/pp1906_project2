<ul class="children single-children">
    <li class="comment-item">
        <div class="post__author author vcard inline-items">
            <img src="{{ getAvatar($post->user->avatar) }}" alt="{{ $post->user->name }}">
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

        <p>{{ $post->content }}</p>

        @if ($post->image)
        @include('pages.blocks.widgets.post_image')
        @endif
    </li>
</ul>
