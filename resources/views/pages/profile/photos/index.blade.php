@extends('pages.profile.profile_master')

@section('profile_content')
@include('pages.profile.photos.title')
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Tab panes -->
            <div class="tab-content">
                <ul class="widget w-last-photo js-zoom-gallery">
                    @if ($postImages)
                        @foreach ($postImages as $image)
                            <li>
                                <a href="{{ asset('storage/images/posts/' . $image) }}">
                                    <img class="all-photos" src="{{ asset('storage/images/posts/' . $image) }}" alt="photo">
                                </a>
                            </li>
                        @endforeach
                    @else
                        <div class="no-photo">@lang('No photo')</div>
                    @endif
                </ul>

                @include('pages.blocks.widgets.no_more')

            </div>
        </div>
    </div>
</div>
@endsection
