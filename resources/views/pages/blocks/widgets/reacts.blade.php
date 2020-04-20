<div class="post-additional-info inline-items">

    @if ($post->reacts()->where('user_id', auth()->id())->where('type', config('react.like'))->exists())
    <a href="#" class="post-add-icon inline-items btn-react-post-like" data-post-id={{ $post->id }} data-react-type={{ config('react.like') }}>
        <img class="not-like-post" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/not_like.svg') }}">
        <img class="like-post" src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
    </a>
    @else
    <a href="#" class="post-add-icon inline-items btn-react-post-like" data-post-id={{ $post->id }} data-react-type={{ config('react.like') }}>
        <img class="not-like-post" src="{{ asset('theme/socialyte/svg-icons/center/not_like.svg') }}">
        <img class="like-post" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
    </a>
    @endif

    @if ($post->reacts()->where('user_id', auth()->id())->where('type', config('react.love'))->exists())
    <a href="#" class="post-add-icon inline-items btn-react-post-love" data-post-id={{ $post->id }} data-react-type={{ config('react.love') }}>
        <img class="not-love-post" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/not_love.svg') }}">
        <img class="love-post" src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}">
    </a>
    @else
    <a href="#" class="post-add-icon inline-items btn-react-post-love" data-post-id={{ $post->id }} data-react-type={{ config('react.love') }}>
        <img class="not-love-post" src="{{ asset('theme/socialyte/svg-icons/center/not_love.svg') }}">
        <img class="love-post" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}">
    </a>
    @endif

    <div class="comments-shared">
        <a href="#" class="post-add-icon inline-items">
            <img src="{{ asset('theme/socialyte/svg-icons/center/not_comment.svg') }}">
        </a>
        <a href="#" class="post-add-icon inline-items" data-toggle="modal" data-target="#sharePostModal{{ $post->share ? $post->share->id : $post->id }}" title="@lang('Share post')">
            <img src="{{ asset('theme/socialyte/svg-icons/center/not_share.svg') }}">
        </a>
    </div>
</div>
@if($post->share)
@include('pages.blocks.modals.create_share', ['post' => $post->share])
@else
@include('pages.blocks.modals.create_share')
@endif
