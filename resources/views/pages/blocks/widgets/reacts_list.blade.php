<div class="post-additional-info inline-items" style="border: none; margin-bottom: 10px;">
    <a href="#" class="post-add-icon inline-items">
        <strong>You and 16 other people reacted this post</strong>
    </a>
    <div class="comments-shared">
        <a href="#" class="post-add-icon inline-items">
            <strong>16 comments</strong>
        </a>
        @if ($post->shares->isNotEmpty())
        <a href="#" class="post-add-icon inline-items" data-toggle="modal" data-target="#shareUsersModal{{ $post->id }}">
            <strong> {{ $post->shares->count() }} @lang('shares')</strong>
        </a>
        @endif
    </div>
</div>
@include('pages.blocks.modals.share_users')
