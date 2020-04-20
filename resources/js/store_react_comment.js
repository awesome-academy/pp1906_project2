import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();
    $('body').on('click', '.btn-react-comment-like, .btn-react-comment-love',  function () {
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

        $.ajax({
            url: 'comments/reacts',
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
