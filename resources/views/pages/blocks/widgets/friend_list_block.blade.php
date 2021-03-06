@foreach ($userFriends as $friend)
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
                    <div class="friend-count">
                        <span class="chat-message-item">
                            @if ($friend->id != auth()->id())
                                @if ($countMutuals = auth()->user()->countMutualFriends($friend->id))
                                    {{ $countMutuals }} @lang('Mutual friends')
                                @else
                                    &nbsp;
                                @endif
                            @else
                                &nbsp;
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

        <!-- ... end Friend Item -->
    </div>
</div>
<!-- end friend block -->
@endforeach
