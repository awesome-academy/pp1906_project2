import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('.reply-comment').on('click', function (event) {
        event.preventDefault();

        $('.reply-form').show();
    });

    $('.reply-form').keypress(function (event) {
        if (event.keyCode == 13 || event.which == 13) {
            event.preventDefault();

            var commentId = $(this).data('comment-id');
            var postId = $(this).data('post-id');
            var content = $(this).find('.reply-content').val();

            var url = '/comments/' + commentId + '/replies';

            var data = {
                'post_id': postId,
                'parent_id': commentId,
                'content': content
            };

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                cache: false,
                success: function (result) {
                    if (result.status) {
                        $(this).parent().find('.comments-list').append(result.comment);
                    } else {
                        errorMessage();
                    }
                },
                error: function () {
                    errorMessage();
                }
            });
        }
    });

});
