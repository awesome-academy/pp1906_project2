@extends('pages.profile.profile_master')

@section('profile_content')
@include('pages.profile.friends.title')
<!-- Friends -->
<div class="container">
    <div class="row">
        @foreach ($user->friends as $friend)
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
                                <a href="{{ route('user.profile', $friend->username) }}" class="h5 author-name">{{ $friend->name }}</a>
                                <div class="country">{{ $friend->address }}</div>
                            </div>
                        </div>

                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <a href="{{ route('user.friends', $friend->username) }}" class="friend-count-item">
                                            <div class="h6">{{ $friend->friends->count('friend_id') }}</div>
                                            <div class="title">@lang('Friends')</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">240</div>
                                            <div class="title">@lang('Photos')</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">16</div>
                                            <div class="title">@lang('Videos')</div>
                                        </a>
                                    </div>
                                    <div class="control-block-button" data-swiper-parallax="-100">
                                        <a href="{{ route('user.profile', $friend->username) }}" class="btn btn-control bg-purple" title="@lang('Go to profile page')">
                                            <img src="{{ asset('theme/socialyte/svg-icons/center/friend_profile.svg') }}">
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
        @endforeach
    </div>
</div>

<!-- ... end Friends -->
@endsection
