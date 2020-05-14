<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-cover" tabindex="-1" role="dialog" aria-labelledby="update-header-cover" aria-hidden="true">
    <div class="modal-dialog window-popup update-header-photo" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('theme/socialyte/svg-icons/center/close.svg') }}">
            </a>
            <div class="modal-header">
                <h6 class="title">@lang('Update Header Cover')</h6>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.uploadProfileImage', auth()->user()->username) }}" enctype="multipart/form-data">
                    @csrf
                    <a href="#" class="upload-photo-item photo-item-margin">
                        <img src="{{ asset('theme/socialyte/svg-icons/center/computer.svg') }}">
                        <h6><label for="upload-cover" class="display-inline">@lang('Upload Photo')</label></h6>
                        <span>@lang('Browse your computer.')</span>
                    </a>
                    <input type="file" id="upload-cover" name="cover" style="display: none">
                    <hr>
                    <div id="image-holder-cover" style="text-align: center;"></div>
                    <button class="btn btn-primary btn-photo">@lang('Upload')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ... end Window-popup Update Header Photo -->
