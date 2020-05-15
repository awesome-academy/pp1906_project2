@foreach ($posts as $post)
<div class="ui-block">

    <article class="hentry post">

        <div class="post__author author vcard inline-items">
            <img class="default-avatar" src="{{ getAvatar($post->user->avatar) }}" alt="{{ $post->user->name }}">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="{{ route('user.profile', $post->user->username) }}">{{ $post->user->name }}</a>

                @if ($post->share)
                    @if ($post->share->user->isCurrentUser())
                        {!! __('share.title_self', ['post_id' => $post->share->id]) !!}
                    @else
                        {!! __('share.title', ['name' => $post->share->user->name, 'username' => $post->share->user->username, 'post_id' => $post->share->id]) !!}
                    @endif
                @endif

                <div class="post-type-icon post__date">
                    <a class="show-post" href="{{ route('posts.show', $post->id) }}">
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
            @if (auth()->id() == $post->user->id)
            @include('pages.blocks.widgets.three_dots')
            @endif
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

    @php
        $lastParentComment = $post->parentComments()->latest()->first();
        $lastChildComment = $post->childComments()->latest()->first();
    @endphp

    @if ($post->allComments()->count() > config('post.comment.max'))
        <a href="#" class="more-comments post-{{ $post->id }}" data-post-id="{{ $post->id }}" data-page="1"> @lang('View more comments') <span>+</span></a>
    @endif
    
    <ul class="comments-list post-{{ $post->id }}">
        @include('pages.blocks.list_comment')
    </ul>
    <!-- Comment Form  -->

    <form class="comment-form inline-items display-none post-{{ $post->id }}">

        <div class="post__author author vcard inline-items">
            <img src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">

            <div class="form-group with-icon-right ">
                <textarea class="form-control comment-content"></textarea>
            </div>
        </div>

        <button class="btn btn-md-2 btn-primary store-comment" data-post_id="{{ $post->id }}"> @lang('Post Comment') </button>

    </form>

    <!-- ... end Comment Form  -->
</div>
@endforeach
