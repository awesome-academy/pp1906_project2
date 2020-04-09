<div class="ui-block">


    <article class="hentry post">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('theme/socialyte/img/avatar10-sm.jpg') }}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
                <div class="post__date">
                    <time class="published" datetime="2004-07-24T18:18">
                        9 hours ago
                    </time>
                </div>
            </div>

            <div class="more">
                <a href="#" class="olymp-three-dots-icon">
                    <img src="{{ asset('theme/socialyte/svg-icons/center/three-dots.svg') }}">
                </a>
                <ul class="more-dropdown">
                    <li>
                        <a href="#">Edit Post</a>
                    </li>
                    <li>
                        <a href="#">Delete Post</a>
                    </li>
                </ul>
            </div>

        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris consequat.
        </p>

        @include('pages.blocks.widgets.reacts_list')
        @include('pages.blocks.widgets.reacts')
    </article>

    @include('pages.blocks.comment')

    <a href="#" class="more-comments">View more comments <span>+</span></a>


    <!-- Comment Form  -->

    <form class="comment-form inline-items">

        <div class="post__author author vcard inline-items">
            <img src="{{ asset('theme/socialyte/img/author-page.jpg') }}" alt="author">

            <div class="form-group with-icon-right ">
                <textarea class="form-control" placeholder=""></textarea>
            </div>
        </div>

        <button class="btn btn-md-2 btn-primary">Post Comment</button>

        <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>

    </form>

    <!-- ... end Comment Form  -->
</div>
