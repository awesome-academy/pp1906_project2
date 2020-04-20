@extends('pages.master')

@section('content')
<div class="container">
    <div class="row">
        <!-- Left Sidebar -->
        <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
            @include('pages.blocks.widgets.birthday')
            @include('pages.blocks.widgets.friend_suggestion')
        </aside>
        <!-- ... end Left Sidebar -->

        <!-- Main Content -->
        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            @include('pages.blocks.post_status')

            <div class="post-data">
                @include('pages.blocks.post')
            </div>

            {{-- @include('pages.blocks.comment_post')
            @include('pages.blocks.reply_comment_post')
            @include('pages.blocks.image_post')
            @include('pages.blocks.multi_image_post')
            @include('pages.blocks.share_post') --}}

            @include('pages.blocks.widgets.no_more')
        </main>
        <!-- ... end Main Content -->

        <!-- Right Sidebar -->
        <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
            @include('pages.blocks.widgets.activity_feed')
        </aside>
        <!-- ... end Right Sidebar -->

        @include('pages.blocks.widgets.back_to_top')
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/preview_image.js') }}"></script>
<script src="{{ asset('js/load_more.js') }}"></script>
<script src="{{ asset('js/store_comment.js') }}"></script>
<script src="{{ asset('js/update_delete_comment.js') }}"></script>
<script src="{{ asset('js/store_react.js') }}"></script>
<script src="{{ asset('js/store_react_comment.js') }}"></script>
<script>
    function errorMessage() {
        Swal.fire({
            icon: 'error',
            title: "@lang('Oops...')",
            text: "@lang('Something went wrong!')",
        });
        location.reload();
    }
</script>
@endsection
