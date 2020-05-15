@foreach($comment->reactUsers->groupBy('id') as $users)
    <div class="birthday-item inline-items">
        <div class="author-thumb">
            <img src="{{ getAvatar($users->first()->avatar) }}" class="default-avatar" alt="{{ $users->first()->name }}">
        </div>
        <div class="birthday-author-name">
             <a href="{{ route('user.profile', $users->first()->username) }}" class="h6 author-name">{{ $users->first()->name }}</a>
        </div>

        @foreach($users as $user)
            @if($user->pivot->type == config('react.like') && $user->pivot->type == config('react.love'))
                <a href="#" class="post-add-icon inline-items btn btn-sm">
                    <img class="like-post" src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
                </a>
                <a href="#" class="post-add-icon inline-items btn btn-sm">
                    <img class="love-post" src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}">
                </a>
            @elseif($user->pivot->type == config('react.like'))
                <a href="#" class="post-add-icon inline-items btn btn-sm">
                    <img class="like-post" src="{{ asset('theme/socialyte/svg-icons/center/liked.svg') }}">
                </a>
            @elseif($user->pivot->type == config('react.love'))
                <a href="#" class="post-add-icon inline-items btn btn-sm">
                    <img class="love-post" src="{{ asset('theme/socialyte/svg-icons/center/loved.svg') }}">
                </a>
            @endif
        @endforeach

    </div>
@endforeach
