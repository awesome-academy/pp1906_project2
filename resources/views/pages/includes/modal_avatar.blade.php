<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-avatar" tabindex="-1" role="dialog" aria-labelledby="update-header-avatar" aria-hidden="true">
    <div class="modal-dialog window-popup update-header-photo" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>
            <div class="modal-header">
                <h6 class="title">@lang('Update Header Avatar')</h6>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.uploadProfileImage', auth()->user()->username) }}" enctype="multipart/form-data">
                    @csrf
                    <a href="#" class="upload-photo-item photo-item-margin">
                        <svg class="olymp-computer-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                        </svg>
                        <h6><label for="upload-avatar" class="display-inline">@lang('Upload Photo')</label></h6>
                        <span>@lang('Browse your computer.')</span>
                    </a>
                    <input type="file" id="upload-avatar" name="avatar" style="display: none">
                    <hr>
                    <div id="image-holder-avatar" style="text-align: center;"></div>
                    <button class="btn btn-primary btn-avatar">@lang('Upload')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ... end Window-popup Update Header Photo -->
