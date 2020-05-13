@extends('pages.profile.profile_master')

@section('profile_content')
@include('pages.profile.photos.title')
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 profile-photos">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="photo-page" role="tabpanel">
                    <ul class="widget w-last-photo js-zoom-gallery">
                        @if ($postImages)
                        @foreach ($postImages as $image)
                        <div class="photo-item col-4-width">
                            <a href="{{ asset('storage/images/posts/' . $image) }}">
                                <img class="all-photos" src="{{ asset('storage/images/posts/' . $image) }}" alt="photo">
                            </a>
                        </div>
                        @endforeach
                        @else
                        <div class="mCustomScrollbar align-center" data-mcs-theme="dark">
                            <li class="nothing-here-wrapper nothing-here-notification nothing-here-photos">
                                <div class="notification-event">
                                    <h6 class="nothing-here">@lang('No photo')<h6>
                                </div>
                            </li>
                        </div>
                        @endif
                    </ul>

                    @include('pages.blocks.widgets.no_more')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
