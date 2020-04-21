<div class="ui-block">

    <!-- News Feed Form  -->

    <div class="news-feed-form single-post">
        <!-- Nav tabs -->
        <div class="ui-block-title">
            <a href="#">
                <img src="{{ asset('theme/socialyte/svg-icons/center/status.svg') }}">
            </a>
            <h6 class="post-status title"> @lang('Post your status') </h6>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="author-thumb">
                        <img class="default-avatar" src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{auth()->user()->name}}">
                    </div>
                    <div class="form-group with-icon label-floating is-empty">
                        <label class="control-label"> @lang('Share what you are thinking here...') </label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder=""></textarea>

                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div id="image-holder"></div>
                    <div class="add-options-message">
                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="@lang('ADD PHOTOS')">
                            <label for="upload-image" class="display-inline">
                                <img src="{{ asset('theme/socialyte/svg-icons/center/camera.svg') }}">
                            </label>
                            <input class="input-image form-control @error('image') is-invalid @enderror" type="file" id="upload-image" name="image[]" multiple>
                        </a>
                        <button class="btn btn-primary btn-md-2"> @lang('Post Status') </button>
                        <div class="form-group post-type">
                            <select class="selectpicker form-control" name="type">
                                <option value="{{ config('post.type.public') }}" selected="selected"> @lang('Public') </option>
                                <option value="{{ config('post.type.private') }}"> @lang('Private') </option>
                                <option value="{{ config('post.type.only_friends') }}"> @lang('Only Friends') </option>
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </div>

                        @error('image.*')
                        <span class="image-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- ... end News Feed Form  -->
</div>
@if (session('error'))
<div class="alert alert-danger" role="alert" style="text-align: center;">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success" role="alert" style="text-align: center;">
    {{ session('success') }}
</div>
@endif
