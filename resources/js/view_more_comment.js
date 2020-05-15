import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();


    $('body').on('click', '.more-comments', function (event) {
        event.preventDefault();

        var postId = $(this).data('post-id');
        var page = $(this).data('page');

        loadMoreComment(postId, page);
    });

    function loadMoreComment(postId, page) {
        var url = '/comments/load-more?page=' + page;

        var data = {
            'post_id': postId,
        }

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            cache: false,
            success: function (result) {
                if (result.status) {
                    if (result.html.length != '') {
                        if (page == 1) {
                            $('.comments-list.post-' + postId).html(result.html);
                        } else {
                            console.log(result.html);
                            $('.comments-list.post-' + postId).prepend(result.html);
                        }
                    } else {
                        $('.more-comments.post-' + postId).remove();
                    }

                    $('.more-comments.post-' + postId).data('page', page + 1);
                    $('.more-comments.post-' + postId).attr('data-page', page + 1);
                } else {
                    errorMessage();
                }
            },
            error: function () {
                errorMessage();
            }
        });
    };
});
