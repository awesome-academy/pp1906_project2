@extends('pages.profile.profile_master')

@section('profile_content')
<!-- Left Sidebar -->
<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
    @include('pages.blocks.widgets.profile_intro')
    @include('pages.blocks.widgets.friends')
</div>
<!-- ... end Left Sidebar -->

<!-- Main Content -->
<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    @include('pages.blocks.post_status')
    @include('pages.blocks.post')
    @include('pages.blocks.comment_post')
    @include('pages.blocks.reply_comment_post')
    @include('pages.blocks.image_post')
    @include('pages.blocks.multi_image_post')
    @include('pages.blocks.share_post')

    @include('pages.blocks.widgets.load_more')
</main>
<!-- ... end Main Content -->

<!-- Right Sidebar -->
<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
    @include('pages.blocks.widgets.photos')
    @include('pages.blocks.widgets.videos')
</div>
<!-- ... end Right Sidebar -->

@endsection
