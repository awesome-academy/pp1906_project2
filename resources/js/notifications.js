import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('.data-count');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('ul.notification-list');
    var notificationNumber = notificationsWrapper.find('.notification-count');

    notificationNumber.text(notificationCount);

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher(pusherKey, {
        cluster: 'ap1',
        forceTLS: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('socialyte' + '_' + currentUserId);

    // Bind a function to a Event (the full Laravel class)
    channel.bind('post-reacted', function (data) {
        notificationNumber.show();

        notifications.find('.notification-message').append(data.sender);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notification-count').text(notificationsCount);
    });


    // show notifications
    $('.control-icon').on('click', '.show-notifications', function (e) {
        e.preventDefault();
        var url = 'notifications/show-notifications';

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                $(".notification-block").append(result.html);
            },
            error: function () {
                errorMessage();
            }
        });
    });
});
