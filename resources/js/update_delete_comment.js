import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('body').on('click', '.save-edit-comment', function () {
        event.preventDefault();
        var postId = parseInt($(this).data('post_id'));
        var commentId = parseInt($(this).data('comment_id'));
        var url = '/comments/' + commentId;
        var content = $(this).parent().parent().find('.edit-comment-content').val();
        var _this = $(this);

        if (content == '') {
            $('.error-content').removeAttr('hidden');

            return false;
        }

        $.ajax({
            url: url,
            type: 'PUT',
            data: {
                'post_id': postId,
                'content': content,
            },
            cache: false,
            success: function (result) {
                if (result.status) {
                    $('.comment-content-' + commentId).html('');
                    $('.comment-content-' + commentId).html(content);
                    $('.edit-comment-modal').modal('hide');
                } else {
                    errorMessage();
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });

    $('body').on('keypress', '.edit-comment-content', function () {
        if (!$('.error-content').attr('hidden')) {
            $('.error-content').attr('hidden', '');
        }
    });

    $('body').on('click', '.delete-comment', function () {
        event.preventDefault();
        var commentId = parseInt($(this).data('comment_delete_id'));
        var url = '/comments/' + commentId;
        $.ajax({
            url: url,
            type: 'DELETE',
            cache: false,
            success: function (result) {
                if (result.status) {
                    $('.delete-comment-modal').modal('hide');
                    setTimeout(function () {
                        $('.comment-item-' + commentId).remove();
                    }, 100);
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });
});
