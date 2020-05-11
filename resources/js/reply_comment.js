import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    function showReplyForm(commentId, replyForm) {
        $('.prefix').remove();

        replyForm.show();
        replyForm.find('.reply-content').val('');

        replyForm.data('comment-id', commentId);
        replyForm.attr('data-comment-id', commentId);

        $('html, body').animate({
            scrollTop: replyForm.offset().top - 500
        });

        replyForm.find('.reply-content').focus();
    }

    //create prefix parent comment name in reply form
    function createTextareaPrefix(commentId, prefixText) {
        $('.reply-content.with-prefix.comment-' + commentId).each(function () {
            var prefix = $('<span/>')
                .text(prefixText)
                .addClass('prefix h6 post__author-name fn')
                .appendTo($(this).parent())
            $(this).css({
                textIndent: prefix.outerWidth() + 'px'
            });
        });
    }

    //reply a comment
    $('body').on('click', '.reply-comment', function (event) {
        event.preventDefault();

        var commentId = $(this).data('comment-id');
        var parentCommentId = $(this).data('parent-comment-id');

        var replyForm = $('.reply-form.comment-' + parentCommentId);

        showReplyForm(commentId, replyForm);
        replyForm.find('.reply-content').removeAttr("style");
    });

    //reply a reply
    $('body').on('click', '.children .reply-comment', function (event) {
        event.preventDefault();

        var commentId = $(this).data('comment-id');
        var parentCommentId = $(this).data('parent-comment-id');
        var commentUser = $(this).data('comment-user');

        var replyForm = $('.reply-form.comment-' + parentCommentId);

        showReplyForm(commentId, replyForm);
        createTextareaPrefix(parentCommentId, commentUser);

    });

    //reply after press Enter key (not Shift-Enter)
    $('body').on('keypress', '.reply-form', function (event) {
        if (((event.keyCode || event.which) == 13) && !event.shiftKey) {
            event.preventDefault();

            var commentId = $(this).data('comment-id');
            var parentCommentId = $(this).data('parent-comment-id');
            var postId = $(this).data('post-id');
            var content = $(this).find('.reply-content').val();

            var childrenRepliesBlock = $('.children.parent-comment-' + parentCommentId);
            var replyForm = $('.reply-form.comment-' + parentCommentId);

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
                        childrenRepliesBlock.append(result.reply);

                        $('.prefix').remove();

                        replyForm.find('.reply-content').removeAttr("style");
                        replyForm.find('.reply-content').val('');
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
