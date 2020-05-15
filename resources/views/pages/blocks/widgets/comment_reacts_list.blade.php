@if ($comment->reacts()->where('user_id', auth()->id())->where('type', config('react.like'))->exists())
<a href="#" class="post-add-icon inline-items no-margin-right btn-react-comment-like" data-comment-id="{{ $comment->id }}" data-react-type="{{ config('react.like') }}">
    <img class="not-like-comment" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/not_like.svg') }}">
    <img class="like-comment" src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
</a>
@else
<a href="#" class="post-add-icon inline-items no-margin-right btn-react-comment-like" data-comment-id="{{ $comment->id }}" data-react-type="{{ config('react.like') }}">
    <img class="not-like-comment" src="{{ asset('theme/socialyte/svg-icons/center/not_like.svg') }}">
    <img class="like-comment" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
</a>
@endif

@if ($comment->reacts()->where('user_id', auth()->id())->where('type', config('react.love'))->exists())
<a href="#" class="post-add-icon inline-items no-margin-right btn-react-comment-love" data-comment-id="{{ $comment->id }}" data-react-type="{{ config('react.love') }}">
    <img class="not-love-comment" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/not_love.svg') }}">
    <img class="love-comment" src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}">
</a>
@else
<a href="#" class="post-add-icon inline-items no-margin-right btn-react-comment-love" data-comment-id="{{ $comment->id }}" data-react-type="{{ config('react.love') }}">
    <img class="not-love-comment" src="{{ asset('theme/socialyte/svg-icons/center/not_love.svg') }}">
    <img class="love-comment" hidden="" src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}">
</a>
@endif
<a href="#" class="post-add-icon inline-items react-this-comment-{{ $comment->id }}"
    data-toggle="modal" data-target="#listReactCommentModal{{ $comment->id }}"
    @if ($comment->reacts->count() == 0)
        hidden
    @endif
    >
    <strong class="count-reacts-{{ $comment->id }}">{{ $comment->reacts->count() }}
    </strong>
        <strong>@lang('react this comment')</strong>
</a>
<a href="#" class="reply reply-comment" data-comment-id="{{ $comment->id }}" data-parent-comment-id="{{ $comment->getOriginalParent() }}" data-comment-user="{{ $comment->user->name }}">
    <strong>@lang('Reply')</strong>
</a>

@include('pages.blocks.modals.list_react_comment')
