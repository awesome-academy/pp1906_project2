import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('body').on('click', '.friends-suggestion .accept', function () {
        event.preventDefault();
        var username = $(this).data('friend-name');
        var friendId = $(this).data('friend-id')

        var url = '/' + username + '/add-friend';

        var data = {
            'friend_id': friendId
        };

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            cache: false,
            success: function (result) {
                if (result.status) {
                    $('.friends-suggestion-' + friendId).fadeOut(500);
                    $('.friends-suggestion-' + friendId).remove();
                    $('.list-friends-suggestion').append(result.html_friend_suggestion);
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
