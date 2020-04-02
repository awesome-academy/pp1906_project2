<div class="ui-block">

    <!-- News Feed Form  -->

    <div class="news-feed-form single-post">
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
                <form method="POST" action="{{ route('posts.store') }}">
                    <div class="author-thumb">
                        <img src="{{ asset('socialyte/img/author-page.jpg') }}" alt="author">
                    </div>
                    <div class="form-group with-icon label-floating is-empty">
                        <label class="control-label">Share what you are thinking here...</label>
                        <textarea class="form-control @error('post_content') is-invalid @enderror" name="post_content" placeholder=""></textarea>

                        @error('post_content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="add-options-message">
                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTOS">
                            <img data-toggle="modal" data-target="#update-header-photo" src="{{ asset('socialyte/svg-icons/center/camera.svg') }}">
                        </a>
                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="TAG YOUR FRIENDS">
                            <img src="{{ asset('socialyte/svg-icons/center/tag.svg') }}">
                        </a>
                        <div class="form-group post-type">
                            <select class="selectpicker form-control">
                                <option selected="selected" disabled="disabled">Post type</option>
                                <option value="public">Public</option>
                                <option value="only_friend">Only friends</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <button class="btn btn-primary btn-md-2">Post Status</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- ... end News Feed Form  -->
</div>
