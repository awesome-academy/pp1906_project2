$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.add-comment-button', function (event) {
        event.preventDefault();
        var postId = $(this).data('post-id');

        commentForm = $('body').find('.comment-form.post-' + postId);

        commentForm.show();

        $('html, body').animate({
            scrollTop: commentForm.offset().top - 500
        });

        commentForm.find('.comment-content').focus();
    });

    $('body').on('click', '.store-comment', function (event) {
        event.preventDefault();

        var url = '/comments';
        var _this = $(this);
        var postId = parseInt($(this).data('post_id'));
        var content = $(this).parent().find('.comment-content').val();
        if (content == '') {
            errorEmptyContent();
        } else {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'post_id': postId,
                    'content': content,
                },
                cache: false,

                success: function (result) {
                    if (result.status) {
                        _this.parent().parent().find('.comments-list').append(result.comment);
                        $('.comment-content').val('');
                        $('.count-comments-' + postId).text(result.count_comments);

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
