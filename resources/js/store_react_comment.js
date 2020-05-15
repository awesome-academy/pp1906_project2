import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();
    $('body').on('click', '.btn-react-comment-like, .btn-react-comment-love', function () {
        event.preventDefault();

        var _this = $(this);

        if (_this.data('react-type') == 1) {
            var reactClass = '.like-comment';
            var unReactClass = '.not-like-comment';
        } else {
            var reactClass = '.love-comment';
            var unReactClass = '.not-love-comment';
        }

        reactAjax(reactClass, unReactClass, _this);
    });

    function reactAjax(reactClass, unReactClass, reactElement) {
        var reactType = parseInt(reactElement.data('react-type'));
        var reactableId = parseInt(reactElement.data('comment-id'));
        var react = reactElement.find(reactClass);
        var unReact = reactElement.find(unReactClass);
        var userReact = reactElement.parent().parent().parent().parent().parent().find('.list-react-comment');

        $.ajax({
            url: '/comments/reacts',
            type: 'POST',
            data: {
                'type': reactType,
                'reactable_id': reactableId,
            },
            cache: false,
            success: function (result) {
                if (result.status) {

                    if (!unReact.attr('hidden')) {
                        unReact.attr('hidden', '');
                    } else {
                        unReact.removeAttr('hidden');
                    }

                    if (react.attr('hidden')) {
                        react.removeAttr('hidden');
                    } else {
                        react.attr('hidden', '');
                    }

                    if (result.count_react == 1) {
                        $('.react-this-comment-' + reactableId).removeAttr('hidden');
                    } else if (result.count_react == 0) {
                        $('.react-this-comment-' + reactableId).attr('hidden', '');
                    }

                    $('.count-reacts-' + reactableId).text(result.count_react);
                    userReact.html();
                    userReact.html(result.view);
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
