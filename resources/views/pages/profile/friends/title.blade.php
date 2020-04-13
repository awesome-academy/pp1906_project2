<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title">
                    <div class="h6 title">
                        {{ __('friends.title', ['name' => $user->name]) }}
                    </div>
                    <form class="w-search">
                        <div class="form-group with-button">
                            <input class="form-control" type="text" placeholder="@lang('Search Friends...')">
                            <button>
                                <img src="{{ asset('theme/socialyte/svg-icons/top_bar/search.svg') }}">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
