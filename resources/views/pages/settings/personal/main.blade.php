<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12 personal">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">@lang('Personal Information')</h6>
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


            <!-- Personal Information Form  -->

            <form method="POST" action="{{ route('user.updateInformation') }}">
                @csrf
                <div class="row">

                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <label class="control-label">@lang('Your Name')</label>
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $currentUser->name }}" autocomplete="name" autofocus placeholder="@lang('Your Name')">
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>


                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <label class="control-label">@lang('Your Gender')</label>
                        <div class="form-group is-select">
                            <select class="selectpicker form-control @error('gender') is-invalid @enderror" name="gender">
                                <option disabled>@lang('Choose Gender')</option>
                                <option value="{{ config('user.gender.male') }}" {{ $currentUser->isMale() ? 'selected' : '' }}>@lang('Male')</option>
                                <option value="{{ config('user.gender.female') }}" {{ $currentUser->isFemale() ? 'selected' : '' }}>@lang('Female')</option>
                            </select>
                        </div>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <label class="control-label">@lang('Your Email')</label>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $currentUser->email }}" disabled autocomplete="email">
                        </div>
                    </div>

                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <label class="control-label">@lang('Your Birthday')</label>
                        <div class="form-group label-floating date-time-picker">
                            <input class="form-control" name="datetimepicker" value="{{ old('birthday') ?? $currentUser->birthday }}" />
                            <span class="input-group-addon">
                                <img src="{{ asset('socialyte/svg-icons/settings/calendar.svg') }}">
                            </span>
                            @error('datetimepicker')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group is-empty">
                            <label class="control-label">@lang('Your Address')</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $currentUser->address }}" autocomplete="address" autofocus placeholder="@lang('Your Address')">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label">@lang('Your Introduce')</label>
                            <textarea id="introduce" class="form-control @error('introduce') is-invalid @enderror" name="introduce" autocomplete="introduce" autofocus placeholder="@lang('Your Introduce')">{{ old('introduce') ?? $currentUser->introduce }}</textarea>
                            @error('introduce')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn btn-primary btn-lg save-changes">@lang('Save all Changes')</button>
                    </div>

                </div>
            </form>

            <!-- ... end Personal Information Form  -->
        </div>
    </div>
</div>
