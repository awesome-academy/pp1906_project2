<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
    <div class="ui-block">

        <!-- Your Profile  -->

        <div class="your-profile">
            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">Your PROFILE</h6>
            </div>

            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h6 class="mb-0">
                            <a class="dropdown" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Profile Settings
                                <img src="{{ asset('socialyte/svg-icons/settings/dropdown.svg') }}">
                            </a>
                        </h6>
                    </div>

                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <ul class="your-profile-menu">
                            <li>
                                <a href="{{ route('setting.personal') }}">Personal Information</a>
                            </li>
                            <li>
                                <a href="{{ route('setting.password') }}">Change Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="ui-block-title">
                <a href="{{ route('setting.notification') }}" class="h6 title">Notifications</a>
                <a href="#" class="items-round-little bg-primary">8</a>
            </div>
            <div class="ui-block-title">
                <a href="{{ route('setting.request') }}" class="h6 title">Friend Requests</a>
                <a href="#" class="items-round-little bg-blue">4</a>
            </div>
        </div>

        <!-- ... end Your Profile  -->

    </div>
</div>
