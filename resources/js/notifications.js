import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    var notificationNumber = $('.notification-count');
    notificationCount = parseInt(notificationCount);

    if (notificationCount == 0) {
        notificationNumber.hide();
    } else {
        notificationNumber.text(notificationCount);
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
    channel.bind('post-reacted', function () {
        if (notificationCount == 0) {
            notificationNumber.show();
        }

        notificationCount++;

        notificationNumber.text(notificationCount);
    });


    // show notifications
    $('.dropdown-notifications').on('show.bs.dropdown', function () {
        var url = '/notifications/show-notifications';

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function () {
                $('.notification-block').html('');
                $('.notification-block').append(result.html);
            },
            error: function () {
                errorMessage();
            }
        });
    });

    // make dropdown not close when clicked
    $('.dropdown-menu').on('click', function (event) {
        event.stopPropagation();
    });

    $('.mark-all-as-read').on('click', function (event) {
        event.preventDefault();
        var url = '/notifications/mark-all';

        $.ajax({
            url: url,
            type: 'POST',
            cache: false,
            success: function (result) {
                if (result.status) {
                    $('.notification-block').html('');
                    $('.notification-block').append(result.html);

                    notificationCount = 0;
                    notificationNumber.hide();
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });
});
