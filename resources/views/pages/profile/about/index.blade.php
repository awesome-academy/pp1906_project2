@extends('pages.profile.profile_master')

@section('profile_content')

<div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Personal Info</h6>
            <a href="#" class="social-item change-profile bg-facebook">
                Change profile
            </a>
        </div>
        <div class="ui-block-content">

            <!-- W-Personal-Info -->

            <ul class="widget w-personal-info">
                <li>
                    <span class="title">{{ __('Name:') }}</span>
                    <span class="text">James Spiegel
                    </span>
                </li>
                <li>
                    <span class="title">{{ __('Gender:') }}</span>
                    <span class="text">Male</span>
                </li>
                <li>
                    <span class="title">{{ __('Email:') }}</span>
                    <a href="#" class="text">jspiegel@yourmail.com</a>
                </li>
                <li>
                    <span class="title">{{ __('Birthday:') }}</span>
                    <span class="text">December 14th, 1980</span>
                </li>
                <li>
                    <span class="title">{{ __('Introduce:') }}</span>
                    <span class="text">Hi, I’m James, I’m 36 and I work as a Digital Designer for the
                        “Daydreams” Agency in Pier 56</span>
                </li>
                <li>
                    <span class="title">{{ __('Address:') }}</span>
                    <span class="text">Austin, Texas, USA</span>
                </li>
            </ul>

            <!-- ... end W-Personal-Info -->
        </div>
    </div>
</div>

@endsection
