@extends('pages.master')

@section('content')
<div class="container">
    <div class="row">
        <!-- Left Sidebar -->
        <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
            @if ($todayBirthdayUsers->count() > 0)
            @include('pages.blocks.widgets.birthday')
            @endif

            @include('pages.blocks.widgets.friend_suggestion')
        </aside>
        <!-- ... end Left Sidebar -->

        <!-- Main Content -->
        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            @include('pages.blocks.post_status')

            @include('pages.blocks.widgets.more_posts')

            <div class="post-data" id="post-data">
                @include('pages.blocks.post')
            </div>

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
<script src="{{ asset('js/activity_feed.js') }}"></script>
<script src="{{ asset('js/load_more.js') }}"></script>
<script src="{{ asset('js/live_reload_posts.js') }}"></script>
<script src="{{ asset('js/friend_suggestion.js') }}"></script>
@endsection
