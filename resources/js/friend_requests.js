import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    var friendsNotificationNumber = $('.friends-notification-count');
    friendsNotificationCount = parseInt(friendsNotificationCount);

    var friendShow = localStorage.getItem('friendShow');

    // check if dropdown is shown before, then remove the notification count
    if (friendShow === 'false') {
        hideFriendsNotificationCount();
    }

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

        localStorage.removeItem('friendShow');
    });


    //hide friends notification count number
    function hideFriendsNotificationCount() {
        friendsNotificationCount = 0;
        friendsNotificationNumber.hide();
    }

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

                        hideFriendsNotificationCount();
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

                localStorage.setItem('friendShow', 'false');
                hideFriendsNotificationCount();
            },
            error: function () {
                errorMessage();
            }
        });
    });

    acceptRequest();
    rejectRequest();
});
