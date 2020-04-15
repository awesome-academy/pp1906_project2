<div class="post-additional-info inline-items">
    <a href="#" class="post-add-icon inline-items">
        <img src="{{ asset('theme/socialyte/svg-icons/center/not_like.svg') }}">
    </a>
    <a href="#" class="post-add-icon inline-items">
        <img src="{{ asset('theme/socialyte/svg-icons/center/not_love.svg') }}">
    </a>
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
