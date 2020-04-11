import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('.add-friend').click(function () {
        var username = $(this).data('friend-name');

        var url = '/' + username + '/add-friend';

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
                    $('.friend-icon').html('');
                    $('.friend-icon').append(result.html);
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });
});
