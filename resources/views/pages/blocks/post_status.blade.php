<div class="ui-block">

    <!-- News Feed Form  -->

    <div class="news-feed-form">
        <!-- Nav tabs -->
        <div class="ui-block-title">
            <a href="#">
                <img src="{{ asset('socialyte/svg-icons/center/status.svg') }}">
            </a>
            <h6 class="title">Post your status</h6>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                <form>
                    <div class="author-thumb">
                        <img src="{{ asset('socialyte/img/author-page.jpg') }}" alt="author">
                    </div>
                    <div class="form-group with-icon label-floating is-empty">
                        <label class="control-label">Share what you are thinking here...</label>
                        <textarea class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="add-options-message">
                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTOS">
                            <img data-toggle="modal" data-target="#update-header-photo" src="{{ asset('socialyte/svg-icons/center/camera.svg') }}">
                        </a>
                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="TAG YOUR FRIENDS">
                            <img src="{{ asset('socialyte/svg-icons/center/tag.svg') }}">
                        </a>

                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD LOCATION">
                            <svg class="olymp-small-pin-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                            </svg>
                        </a>

                        <button class="btn btn-primary btn-md-2">Post Status</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- ... end News Feed Form  -->
</div>
