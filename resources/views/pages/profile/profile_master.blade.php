@extends('pages.master')

@section('content')
<div class="container">
    <div class="row">
        @include('pages.profile.profile_top')

        @yield('profile_content')

        @include('pages.blocks.widgets.back_to_top')
    </div>
</div>
@endsection
