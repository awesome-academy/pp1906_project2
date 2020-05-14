<div class="post-additional-info inline-items" style="border: none; margin-bottom: 10px;">
    <a href="#" class="post-add-icon inline-items react-this-post-{{ $post->id }}"
        @if ($post->reacts->count() == 0)
            hidden
        @endif
        data-toggle="modal" data-target="#listReactModal{{ $post->id }}">
        <strong>
            <strong class="count-reacts"> {{ $post->reacts->count() }} </strong>
            @lang('react this post')
        </strong>
    </a>
    <div class="comments-shared">
        @if ($post->shares->isNotEmpty())
        <a href="#" class="post-add-icon inline-items" data-toggle="modal" data-target="#shareUsersModal{{ $post->id }}">
            <strong> {{ $post->shares->count() }} @lang('shares')</strong>
        </a>
        @endif
    </div>
</div>

@include('pages.blocks.modals.share_users')
@include('pages.blocks.modals.list_react_post')
