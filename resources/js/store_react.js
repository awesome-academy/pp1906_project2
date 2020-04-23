import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('body').on('click', '.btn-react-post-like, .btn-react-post-love',  function () {
        event.preventDefault();

        var _this = $(this);

        if (_this.data('react-type') == 1) {
            var reactClass = '.like-post';
            var unReactClass = '.not-like-post';
        } else {
            var reactClass = '.love-post';
            var unReactClass = '.not-love-post';
        }

        reactAjax(reactClass, unReactClass, _this);
    });

    function reactAjax(reactClass, unReactClass, reactElement) {
        var reactType = parseInt(reactElement.data('react-type'));
        var reactableId = parseInt(reactElement.data('post-id'));
        var react = reactElement.find(reactClass);
        var unReact = reactElement.find(unReactClass);
        var userReact = reactElement.parent().parent().parent().parent().parent().find('.list-react-post');

        $.ajax({
            url: 'reacts',
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

                    reactElement.parent().parent().find('.count-reacts').text(result.count_react);
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

