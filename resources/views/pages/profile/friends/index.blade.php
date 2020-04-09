@extends('pages.profile.profile_master')

@section('profile_content')
@include('pages.profile.friends.title')
<!-- Friends -->
<div class="container">
    <div class="row">

        <!-- start friend block -->
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="{{ asset('theme/socialyte/img/friend1.jpg') }}" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="{{ asset('theme/socialyte/img/avatar1.jpg') }}" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Nicholas Grissom</a>
                                <div class="country">San Francisco, CA</div>
                            </div>
                        </div>

                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">52</div>
                                            <div class="title">Friends</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">240</div>
                                            <div class="title">Photos</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">16</div>
                                            <div class="title">Videos</div>
                                        </a>
                                    </div>
                                    <div class="control-block-button" data-swiper-parallax="-100">
                                        <a href="#" class="btn btn-control bg-purple" title="Go to profile page">
                                            <img src="{{ asset('theme/socialyte/svg-icons/center/friend_profile.svg') }}">
                                        </a>

                                        <a href="#" class="btn btn-control" title="Unfriend">
                                            <img style="width: auto;" src="{{ asset('theme/socialyte/svg-icons/center/unfriend.svg') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ... end Friend Item -->
            </div>
        </div>
        <!-- end friend block -->

        <!-- start friend block -->
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="{{ asset('theme/socialyte/img/friend1.jpg') }}" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="{{ asset('theme/socialyte/img/avatar1.jpg') }}" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Nicholas Grissom</a>
                                <div class="country">San Francisco, CA</div>
                            </div>
                        </div>

                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">52</div>
                                            <div class="title">Friends</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">240</div>
                                            <div class="title">Photos</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">16</div>
                                            <div class="title">Videos</div>
                                        </a>
                                    </div>
                                    <div class="control-block-button" data-swiper-parallax="-100">
                                        <a href="#" class="btn btn-control bg-purple" title="Go to profile page">
                                            <img src="{{ asset('theme/socialyte/svg-icons/center/friend_profile.svg') }}">
                                        </a>

                                        <a href="#" class="btn btn-control" title="Unfriend">
                                            <img style="width: auto;" src="{{ asset('theme/socialyte/svg-icons/center/unfriend.svg') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ... end Friend Item -->
            </div>
        </div>
        <!-- end friend block -->

        <!-- start friend block -->
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="{{ asset('theme/socialyte/img/friend1.jpg') }}" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="{{ asset('theme/socialyte/img/avatar1.jpg') }}" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Nicholas Grissom</a>
                                <div class="country">San Francisco, CA</div>
                            </div>
                        </div>

                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">52</div>
                                            <div class="title">Friends</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">240</div>
                                            <div class="title">Photos</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">16</div>
                                            <div class="title">Videos</div>
                                        </a>
                                    </div>
                                    <div class="control-block-button" data-swiper-parallax="-100">
                                        <a href="#" class="btn btn-control bg-purple" title="Go to profile page">
                                            <img src="{{ asset('theme/socialyte/svg-icons/center/friend_profile.svg') }}">
                                        </a>

                                        <a href="#" class="btn btn-control" title="Unfriend">
                                            <img style="width: auto;" src="{{ asset('theme/socialyte/svg-icons/center/unfriend.svg') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ... end Friend Item -->
            </div>
        </div>
        <!-- end friend block -->

        <!-- start friend block -->
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="ui-block">

                <!-- Friend Item -->

                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="{{ asset('theme/socialyte/img/friend1.jpg') }}" alt="friend">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="{{ asset('theme/socialyte/img/avatar1.jpg') }}" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">Nicholas Grissom</a>
                                <div class="country">San Francisco, CA</div>
                            </div>
                        </div>

                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">52</div>
                                            <div class="title">Friends</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">240</div>
                                            <div class="title">Photos</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">16</div>
                                            <div class="title">Videos</div>
                                        </a>
                                    </div>
                                    <div class="control-block-button" data-swiper-parallax="-100">
                                        <a href="#" class="btn btn-control bg-purple" title="Go to profile page">
                                            <img src="{{ asset('theme/socialyte/svg-icons/center/friend_profile.svg') }}">
                                        </a>

                                        <a href="#" class="btn btn-control" title="Unfriend">
                                            <img style="width: auto;" src="{{ asset('theme/socialyte/svg-icons/center/unfriend.svg') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ... end Friend Item -->
            </div>
        </div>
        <!-- end friend block -->
    </div>
</div>

<!-- ... end Friends -->
@endsection
