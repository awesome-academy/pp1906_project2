<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header">
                    <div class="top-header-thumb">
                        <img class="default-photo" src="{{ getCover($user->cover) }}" alt="{{ $user->name }}">
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="#" class="active">@lang('Timeline')</a>
                                    </li>
                                    <li>
                                        <a href="#" class="active">@lang('About')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{ route('user.friends', $user->username) }}" class="active">@lang('Friends')</a>
                                    </li>
                                    <li>
                                        <a href="#" class="active">@lang('Photos')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @include('pages.blocks.widgets.control_block')
                    </div>
                    <div class="top-header-author">
                        <a href="#" class="author-thumb">
                            <img id="default-avatar-profile" src="{{ getAvatar($user->avatar) }}" alt="{{ $user->name }}">
                        </a>
                        <div class="author-content">
                            <a href="{{ asset('user.profile', $user->username) }}" class="h4 author-name">{{ $user->name }}</a>
                            <span class="friends-mark">
                                @if (auth()->user()->bothFriends($user->id))
                                @include('pages.blocks.widgets.friends_mark')
                                @endif
                            </span>
                            <div class="country">{{ $user->address ?? ''}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
