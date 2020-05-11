import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    var morePostTop = 451;

    function showFixedDiv(currentScroll, morePostElem) {
        if (currentScroll >= morePostTop) {
            morePostElem.css({
                position: 'fixed',
                top: '75px',
                left: '46.5%',
                zIndex: 19,
            });
        } else {
            morePostElem.css({
                position: 'static',
            });
        }
    }

    function showFixedDivOnScroll(morePostElem) {
        $(window).scroll(function () {
            var currentScroll = $(window).scrollTop();

            if (currentScroll >= morePostTop) {
                morePostElem.css({
                    position: 'fixed',
                    top: '75px',
                    left: '46.5%',
                    zIndex: 19,
                });
            } else {
                morePostElem.css({
                    position: 'static',
                });
            }
        });
    }

    function showMorePost(html) {
        $('body').on('click', '.more-post', function () {
            $("html,body").animate({
                scrollTop: morePostTop - 200
            }, 1200);

            $(this).fadeOut();

            $('.post-data').html(html).fadeIn(500);

        });
    }

    var url = '/get-latest-posts';

    setInterval(function () {
        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (result.status) {
                    if (result.count > 0) {
                        var morePost = $('.more-post');

                        if (morePost.is(':hidden')) {
                            morePost.fadeIn();
                        }

                        showFixedDiv($(window).scrollTop(), morePost);

                        showFixedDivOnScroll(morePost);

                        showMorePost(result.html);

                    }
                } else {
                    errorMessage();
                }
            },
            error: function () {
                errorMessage();
            }
        });
    }, 1200000);
});
