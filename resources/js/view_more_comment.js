import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('.more-comments').click(function() {
        event.preventDefault();

        var _this = $(this);

        var lastPage = parseInt(_this.attr('data-last_page'));
        var page = parseInt(_this.attr('data-page'));

        var url = 'comments/load-more/?page=' + page;

        var postId = parseInt(_this.data('post-id'));
        var commentFirstId = parseInt(_this.data('comment-first-id'));

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                'post_id': postId,
            },
            cache: false,
            success: function (result) {
                if (result.status) {
                    if (page >= lastPage) {
                        _this.remove();
                    }

                    _this.attr('data-page', page + 1);

                    if (page == 1) {
                        $('.comment-item-' + commentFirstId).remove();
                    }

                    $('.post-comment-list-' + postId).append(result.html);
                } else {
                    errorMessage();
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });
});
