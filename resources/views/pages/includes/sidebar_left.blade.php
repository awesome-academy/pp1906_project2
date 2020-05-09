<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar">
    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

        <a href="/" class="logo">
            <div class="img-wrap">
                <img src="{{ asset('theme/socialyte/img/logo-2.png') }}" alt="Olympus">
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="/" title="@lang('Newsfeed')">
                        <img src="{{ asset('theme/socialyte/svg-icons/sidebar_left/newsfeed.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.profile', auth()->user()->username) }}" title="@lang('Profile')">
                        <img src="{{ asset('theme/socialyte/svg-icons/sidebar_left/profile.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.friends', auth()->user()->username) }}" title="@lang('Friends')">
                        <img src="{{ asset('theme/socialyte/svg-icons/sidebar_left/group.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="#" title="@lang('Photos')">
                        <img src="{{ asset('theme/socialyte/svg-icons/sidebar_left/picture.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="{{ route('birthdays.index') }}" title="@lang('Birthday')">
                        <img src="{{ asset('theme/socialyte/svg-icons/sidebar_left/cake.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.showInformation') }}" title="@lang('User Settings')">
                        <img src="{{ asset('theme/socialyte/svg-icons/sidebar_left/settings.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" title="@lang('Log out')" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <img src="{{ asset('theme/socialyte/svg-icons/sidebar_left/logout.svg') }}">
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- ... end Fixed Sidebar Left -->
