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
                        <img src="{{ getCover($friend->cover) }}" alt="{{ $friend->name }}">
                    </div>

                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="{{ getAvatar($friend->avatar) }}" alt="{{ $friend->name }}">
                            </div>
                            <div class="author-content">
                                <a href="{{ route('user.profile', $friend->username) }}" class="h5 author-name">{{ $friend->name }}</a>
                            </div>
                        </div>

                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <span class="chat-message-item">
                                            @if ($countMutuals = auth()->user()->countMutualFriends($friend->id))
                                                {{ $countMutuals }} @lang('Mutual friends')
                                            @endif
                                        </span>
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
