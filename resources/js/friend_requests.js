import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    var friendsNotificationNumber = $('.friends-notification-count');
    friendsNotificationCount = parseInt(friendsNotificationCount);

    if (friendsNotificationCount == 0) {
        friendsNotificationNumber.hide();
    } else {
        friendsNotificationNumber.text(friendsNotificationCount);
    }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher(pusherKey, {
        cluster: 'ap1',
        forceTLS: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('socialyte' + '_' + currentUserId);

    // Bind a function to a Event (the full Laravel class)
    channel.bind('friend-requested', function () {
        if (friendsNotificationCount == 0) {
            friendsNotificationNumber.show();
        }

        friendsNotificationCount++;

        friendsNotificationNumber.text(friendsNotificationCount);
    });


    // accept a friend request
    function acceptRequest() {
        $('.friends-requesting').on('click', '.accept', function () {
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
                        if ($('.friend-icon').length) {
                            $('.friend-icon').html('');
                            $('.friend-icon').append(result.html);
                        }

                        if ($('.friends-mark').length) {
                            $('.friends-mark').html('');
                            $('.friends-mark').append(result.mark);
                        }

                        $('.friends-notification-block').html('');
                        $('.friends-notification-block').append(result.notification);
                    } else {
                        errorMessage();
                    }
                },
                error: function () {
                    errorMessage();
                }
            });
        });
    }

    // reject a friend request
    function rejectRequest() {
        $('.friends-requesting').on('click', '.reject', function (event) {
            event.preventDefault();
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
                        if ($('.friend-icon').length) {
                            $('.friend-icon').html('');
                            $('.friend-icon').append(result.html);
                        }

                        $('.friends-notification-block').html('');
                        $('.friends-notification-block').append(result.notification);

                        friendsNotificationCount = 0;
                        friendsNotificationNumber.hide();
                    }
                },
                error: function () {
                    errorMessage();
                }
            });
        });
    }


    // show notifications
    $('.dropdown-friends-notifications').on('show.bs.dropdown', function () {
        var url = '/friend-notifications/show-notifications';

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                $('.friends-notification-block').html('');
                $('.friends-notification-block').append(result.html);
                acceptRequest();
                rejectRequest();
            },
            error: function () {
                errorMessage();
            }
        });
    });
});
