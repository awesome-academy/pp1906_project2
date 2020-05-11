<!-- Window-popup Restore Password -->

<div class="modal fade" id="email-success" tabindex="-1" role="dialog" aria-labelledby="email-success" aria-hidden="true">
    <div class="modal-dialog window-popup restore-password-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('theme/socialyte/svg-icons/center/close.svg') }}">
            </a>

            <div class="modal-header">
                <h6 class="title">@lang('Restore your Password')</h6>
            </div>

            <div class="modal-body">
                <img class="email-success-image" src="{{ asset('theme/socialyte/img/success.png') }}">
                <h6 class="title align-center">@lang("Password Reset Email Sent")</h6>
                <p>@lang("An email has been sent to your email address. Follow the directions in the email to reset your password")</p>
            </div>
        </div>
    </div>
</div>

<!-- ... end Window-popup Restore Password -->
