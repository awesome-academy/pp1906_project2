<div class="more">
    <a href="#" class="olymp-three-dots-icon">
        <img src="{{ asset('socialyte/svg-icons/center/three-dots.svg') }}">
    </a>
    <ul class="more-dropdown width-100">
        <li>
            <a href="#" data-toggle="modal" data-target="#editPostModal{{ $post->id }}">@lang('Edit')</a>
        </li>
        <li>
            <a href="#" data-toggle="modal" data-target="#confirmDeleteModal{{ $post->id }}">@lang('Delete')</a>
        </li>
    </ul>
    @include('pages.blocks.modals.edit_post')
    @include('pages.blocks.modals.delete_post')
</div>
