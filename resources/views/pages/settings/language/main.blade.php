<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">@lang('Language Setting')</h6>
        </div>
        <div class="ui-block-content">
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
            <form method="POST" action="{{ route('user.updateLanguage') }}">
                @csrf
                <div class="row">

                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating is-select">
                            <select name="language" class="selectpicker form-control">
                                <option value="{{ config('user.language.en') }}" {{ auth()->user()->language == config('user.language.en') ? 'selected' : '' }}>@lang('English')</option>
                                <option value="{{ config('user.language.vi') }}" {{ auth()->user()->language == config('user.language.vi') ? 'selected' : '' }}>@lang('Vietnamese')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 padding-top">
                        <button href="" class="btn btn-primary btn-lg full-width">@lang('Save all Changes')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
