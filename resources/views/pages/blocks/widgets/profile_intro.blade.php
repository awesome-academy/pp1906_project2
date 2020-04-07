<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">@lang('Profile Intro')</h6>
    </div>
    <div class="ui-block-content">

        <!-- W-Personal-Info -->

        <ul class="widget w-personal-info item-block">
            @if(isset($user->introduce))
            <li>
                <span class="title">@lang('About Me'):</span>
                <span class="text">{{ $user->introduce }}</span>
            </li>
            @endif
            @if(isset($user->gender))
            <li>
                <span class="title">@lang('Gender'):</span>
                <span class="text">
                    @if ($user->isMale())
                    @lang('Male')
                    @else
                    @lang('Female')
                    @endif
                </span>
            </li>
            @endif
            @if(isset($user->birthday))
            <li>
                <span class="title">@lang('Birthday'):</span>
                <span class="text">{{ date('d/m/Y', strtotime($user->birthday)) }}</span>
            </li>
            @endif
            <li>
                <span class="title">@lang('Email'):</span>
                <span class="text">{{ $user->email }}</span>
            </li>
        </ul>

        <!-- .. end W-Personal-Info -->
    </div>
</div>
