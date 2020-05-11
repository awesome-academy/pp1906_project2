<!-- Window-popup Restore Password -->

<div class="modal fade" id="restore-password" tabindex="-1" role="dialog" aria-labelledby="restore-password" aria-hidden="true">
    <div class="modal-dialog window-popup restore-password-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('theme/socialyte/svg-icons/center/close.svg') }}">
            </a>

            <div class="modal-header">
                <h6 class="title">@lang('Restore your Password')</h6>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <p>@lang("Enter your email and click the send password reset link button. You’ll receive a link in your email. Access the link to change the old password for a new one")</p>
                    <div class="form-group label-floating">
                        <label class="control-label">@lang('Your Email')</label>
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="" type="email" name="email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-purple btn-lg full-width send-email-reset">@lang('Send Password Reset Link')</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- ... end Window-popup Restore Password -->
