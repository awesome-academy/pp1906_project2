@extends('pages.profile.profile_master')

@section('profile_content')
@include('pages.profile.photos.title')
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="photo-page" role="tabpanel">

                    <div class="photo-item col-4-width">
                        <img src="{{ asset('socialyte/img/photo-item3.jpg') }}" alt="photo">
                        <div class="overlay overlay-dark"></div>
                        <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
                        <div class="content">
                            <a href="#" class="h6 title">Header Photos</a>
                            <time class="published" datetime="2017-03-24T18:18">1 week ago</time>
                        </div>
                    </div>


                    <div class="photo-item col-4-width">
                        <img src="{{ asset('socialyte/img/photo-item4.jpg') }}" alt="photo">
                        <div class="overlay overlay-dark"></div>
                        <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
                        <div class="content">
                            <a href="#" class="h6 title">Header Photos</a>
                            <time class="published" datetime="2017-03-24T18:18">1 week ago</time>
                        </div>
                    </div>


                    <div class="photo-item col-4-width">
                        <img src="{{ asset('socialyte/img/photo-item5.jpg') }}" alt="photo">
                        <div class="overlay overlay-dark"></div>
                        <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
                        <div class="content">
                            <a href="#" class="h6 title">Header Photos</a>
                            <time class="published" datetime="2017-03-24T18:18">1 week ago</time>
                        </div>
                    </div>

                    <div class="photo-item col-4-width">
                        <img src="{{ asset('socialyte/img/photo-item7.jpg') }}" alt="photo">
                        <div class="overlay overlay-dark"></div>
                        <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
                        <div class="content">
                            <a href="#" class="h6 title">Header Photos</a>
                            <time class="published" datetime="2017-03-24T18:18">1 week ago</time>
                        </div>
                    </div>


                    <div class="photo-item col-4-width">
                        <img src="{{ asset('socialyte/img/photo-item8.jpg') }}" alt="photo">
                        <div class="overlay overlay-dark"></div>
                        <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
                        <div class="content">
                            <a href="#" class="h6 title">Header Photos</a>
                            <time class="published" datetime="2017-03-24T18:18">1 week ago</time>
                        </div>
                    </div>


                    <div class="photo-item col-4-width">
                        <img src="{{ asset('socialyte/img/photo-item9.jpg') }}" alt="photo">
                        <div class="overlay overlay-dark"></div>
                        <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
                        <div class="content">
                            <a href="#" class="h6 title">Header Photos</a>
                            <time class="published" datetime="2017-03-24T18:18">1 week ago</time>
                        </div>
                    </div>


                    <div class="photo-item col-4-width">
                        <img src="{{ asset('socialyte/img/photo-item10.jpg') }}" alt="photo">
                        <div class="overlay overlay-dark"></div>
                        <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
                        <div class="content">
                            <a href="#" class="h6 title">Header Photos</a>
                            <time class="published" datetime="2017-03-24T18:18">1 week ago</time>
                        </div>
                    </div>


                    <div class="photo-item col-4-width">
                        <img src="{{ asset('socialyte/img/photo-item11.jpg') }}" alt="photo">
                        <div class="overlay overlay-dark"></div>
                        <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
                        <div class="content">
                            <a href="#" class="h6 title">Header Photos</a>
                            <time class="published" datetime="2017-03-24T18:18">1 week ago</time>
                        </div>
                    </div>

                    @include('pages.blocks.widgets.load_more')

                </div>
                @include('pages.blocks.widgets.photo_popup')
            </div>
        </div>
    </div>
</div>
@endsection
