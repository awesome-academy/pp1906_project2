<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">@lang('Activity Feed')</h6>
    </div>

    <!-- W-Activity-Feed -->

    <ul class="widget w-activity-feed notification-list">
        @foreach ($activities as $activity)
        @if ($activity->isUpload())
        <li>
            <div class="author-thumb">
                <img class="default-avatar" src="{{ getAvatar($activity->user->avatar) }}" alt="{{ $activity->user->name }}">
            </div>
            <div class="notification-event">
                <a href="{{ route('user.profile', $activity->user->username) }}" class="h6 notification-friend">{{ $activity->user->name }} </a> @lang('uploaded a') <a href="{{ route('posts.show', $activity->post->id) }}" class="notification-link">@lang(' post')</a>
                <span class="notification-date"><time class="entry-date updated">{{ getCreatedFromTime($activity) }}</time></span>
            </div>
        </li>
        @else
        <li>
            <div class="author-thumb">
                <img class="default-avatar" src="{{ getAvatar($activity->user->avatar) }}" alt="{{ $activity->user->name }}">
            </div>
            <div class="notification-event">
                <a href="{{ route('user.profile', $activity->user->username) }}" class="h6 notification-friend">{{ $activity->user->name }}</a> 
                @if ($activity->isLike())
                    @if ($activity->post->user->id == auth()->id())
                        {!! __('activity.to_present_user.like', ['post_id' => $activity->post->id]) !!}
                    @else
                        {!! __('activity.to_others.like', ['user_name' => $activity->post->user->name, 'post_id' => $activity->post->id]) !!}
                    @endif
                @elseif ($activity->isLove())
                    @if ($activity->post->user->id == auth()->id())
                        {!! __('activity.to_present_user.love', ['post_id' => $activity->post->id]) !!}
                    @else
                        {!! __('activity.to_others.love', ['user_name' => $activity->post->user->name, 'post_id' => $activity->post->id]) !!}
                    @endif
                @elseif ($activity->isComment())
                    @if ($activity->post->user->id == auth()->id())
                        {!! __('activity.to_present_user.comment', ['post_id' => $activity->post->id]) !!}
                    @else
                        {!! __('activity.to_others.comment', ['user_name' => $activity->post->user->name, 'post_id' => $activity->post->id]) !!}
                    @endif
                @elseif ($activity->isShare())
                    @if ($activity->post->user->id == auth()->id())
                        {!! __('activity.to_present_user.share', ['post_id' => $activity->post->id]) !!}
                    @else
                        {!! __('activity.to_others.share', ['user_name' => $activity->post->user->name, 'post_id' => $activity->post->id]) !!}
                    @endif
                @endif
                <span class="notification-date"><time class="entry-date updated">{{ getCreatedFromTime($activity) }}</time></span>
            </div>
        </li>
        @endif
        @endforeach

    </ul>

    <!-- .. end W-Activity-Feed -->
</div>
