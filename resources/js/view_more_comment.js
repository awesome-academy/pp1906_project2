import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('.more-comments').click(function() {
        event.preventDefault();
        var url = 'comments/load-more';
        var postId = parseInt($(this).data('post-id'));
        var commentId = parseInt($(this).data('comment-first-id'));

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                'post_id': postId,
            },
            cache: false,
            success: function (result) {
                if (result.status) {
                    $('.post-comment-list-' + postId).html('');
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
