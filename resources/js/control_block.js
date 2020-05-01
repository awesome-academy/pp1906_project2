import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    //ajax setup
    ajaxSetup();

    //send a friend request
    $('.friend-icon').on('click', '.add-friend', function (e) {
        e.preventDefault();
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

    // remove a friend request
    $('.friend-icon, .requesting').on('click', '.un-request', function (e) {
        e.preventDefault();
        var username = $(this).data('friend-name');

        var url = '/' + username + '/un-request';

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

    // accept a friend request
    $('.requesting').on('click', '.accept', function (e) {
        e.preventDefault();
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
                    $('.friend-icon').html('');
                    $('.friends-mark').html('');

                    $('.friend-icon').append(result.html);
                    $('.friends-mark').append(result.mark);
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });

    // reject a friend request
    $('.requesting').on('click', '.reject', function (e) {
        e.preventDefault();
        var username = $(this).data('friend-name');

        var url = '/' + username + '/reject-friend';

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
