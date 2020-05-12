<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">@lang('Change Password')</h6>
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

            <!-- Change Password Form -->

            <form method="POST" action="{{ route('user.updatePassword', auth()->id()) }}">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">@lang('Confirm Current Password')</label>
                            <input class="form-control @error('current_password') is-invalid @enderror" placeholder="" type="password" name="current_password" required>
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">@lang('Your New Password')</label>
                            <input class="form-control @error('new_password') is-invalid @enderror" placeholder="" type="password" name="new_password" required>
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">@lang('Confirm New Password')</label>
                            <input class="form-control @error('new_password_confirm') is-invalid @enderror" placeholder="" type="password" name="new_password_confirmation" required>
                        </div>
                    </div>

                    <div class="col col-lg-2 col-sm-12 col-sm-12 col-2">
                        <div class="remember">
                            <a href="#" class="forgot" data-toggle="modal" data-target="#restore-password">@lang('Forgot my Password')</a>
                        </div>
                    </div>

                    <div class="col col-xl-10 col-lg-12 col-md-10 col-sm-12 col-10">
                        <button class="btn btn-primary btn-lg save-changes">@lang('Save all Changes')</button>
                    </div>

                </div>
            </form>

            <!-- ... end Change Password Form -->
        </div>
    </div>
</div>
@include('pages.settings.password.forgot')
@include('pages.settings.password.email_success')

@section('script')
@if ($errors->has('email'))
<script>
    $(document).ready(function() {
        $('#restore-password').modal('show');
    });
</script>
@endif
@if (session('status'))
<script>
    $(document).ready(function() {
        $('#email-success').modal('show');
    });
</script>
@endif
@endsection
