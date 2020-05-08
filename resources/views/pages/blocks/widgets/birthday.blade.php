<div class="ui-block">

    <!-- W-Birthsday-Alert -->

    <div class="widget w-birthday-alert">
        <div class="content">
            <div class="author-thumb">
                <img src="{{ getAvatar($randomTodayBirthdayUser->avatar) }}" alt="{{ $randomTodayBirthdayUser->name }}">
            </div>
            <span>@lang('Today is')</span>
            <a href="{{ route('user.profile', $randomTodayBirthdayUser->username) }}" class="h4 title">
                {{ __('birthday.random_today', ['user_name' => $randomTodayBirthdayUser->name]) }}
            </a>
            <p>
                @choice('birthday.go_to_profile', $randomTodayBirthdayUser->gender)
            </p>

            @if ($todayBirthdayUsers->count() > 1)
            <a href="{{ route('birthdays.index') }}" class="more-birthdays">
                @lang('There\'s more birthdays today. Let\'s check it out!')
            </a>
            @endif
        </div>
    </div>

    <!-- ... end W-Birthsday-Alert -->
</div>
