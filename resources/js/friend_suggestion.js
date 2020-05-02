import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('.friends-suggestion').on('click', '.accept', function () {
        var username = $(this).data('friend-name');

        var url = '/' + username + '/accept-friend';

        var data = {
            'friend_id': $(this).data('friend-id')
        };

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            cache: false,
            success: function (result) {
                if (result.status) {
                    //
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
