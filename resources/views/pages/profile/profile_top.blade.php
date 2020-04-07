<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header">
                    <div class="top-header-thumb">
                        <img src="{{ asset('socialyte/img/top-header1.jpg') }}" alt="nature">
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="#" class="active">@lang('Timeline')</a>
                                    </li>
                                    <li>
                                        <a href="#">@lang('About')</a>
                                    </li>
                                    <li>
                                        <a href="#">@lang('Friends')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="#">@lang('Photos')</a>
                                    </li>
                                    <li>
                                        <a href="#">@lang('Videos')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @include('pages.blocks.widgets.control_block')
                    </div>
                    <div class="top-header-author">
                        <a href="02-ProfilePage.html" class="author-thumb">
                            <img src="{{ asset('socialyte/img/author-main1.jpg') }}" alt="author">
                        </a>
                        <div class="author-content">
                            <a href="02-ProfilePage.html" class="h4 author-name">{{ $user->name }}</a>
                            <div class="country">{{ $user->address ?? ''}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
