<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title">
                    <div class="h6 title">
                        {{ __('friends.title', ['name' => $user->name]) }}
                    </div>
                    <div class="w-search">
                        <div class="form-group with-button">
                            <input class="form-control search-friend-form" type="text" placeholder="@lang('Search Friends...')" data-user-name="{{ $user->username }}">

                            <button class="search-friends" data-user-name="{{ $user->username }}">
                                <img src="{{ asset('theme/socialyte/svg-icons/top_bar/search.svg') }}">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
