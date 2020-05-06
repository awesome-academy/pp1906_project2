@if ($comment->reacts()->where('user_id', auth()->id())->where('type', config('react.like'))->exists())
<a href="#" class="post-add-icon inline-items no-margin-right btn-react-comment-like" data-comment-id="{{ $comment->id }}" data-react-type="{{ config('react.like') }}>
    <img class=" not-like-comment" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/not_like.svg') }}">
    <img class="like-comment" src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
</a>
@else
<a href="#" class="post-add-icon inline-items no-margin-right btn-react-comment-like" data-comment-id="{{ $comment->id }}" data-react-type="{{ config('react.like') }}>
    <img class=" not-like-comment" src="{{ asset('theme/socialyte/svg-icons/center/not_like.svg') }}">
    <img class="like-comment" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
</a>
@endif

@if ($comment->reacts()->where('user_id', auth()->id())->where('type', config('react.love'))->exists())
<a href="#" class="post-add-icon inline-items no-margin-right btn-react-comment-love" data-comment-id="{{ $comment->id }}" data-react-type={{ config('react.love') }}>
    <img class="not-love-comment" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/not_love.svg') }}">
    <img class="love-comment" src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}">
</a>
@else
<a href="#" class="post-add-icon inline-items no-margin-right btn-react-comment-love" data-comment-id="{{ $comment->id }}" data-react-type={{ config('react.love') }}>
    <img class="not-love-comment" src="{{ asset('theme/socialyte/svg-icons/center/not_love.svg') }}">
    <img class="love-comment" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}">
</a>
@endif
<a href="#" class="post-add-icon inline-items">
    <strong>You and 16 other people reacted this comment</strong>
</a>
<a href="#" class="reply reply-comment">
    <strong>@lang('Reply')</strong>
</a>

<form class="comment-form reply-form inline-items display-none" data-comment-id="{{ $comment->id }}" data-post-id="{{ $post->id }}">
    <div class="post__author author vcard inline-items">
        <img src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">

        <div class="form-group with-icon-right reply-form-group">
            <textarea class="form-control reply-content"></textarea>
            <div class="add-options-message">
                <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                    <svg class="olymp-camera-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</form>
