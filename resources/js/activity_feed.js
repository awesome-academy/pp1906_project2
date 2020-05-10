import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    function pushActivity(activityList, html) {
        activityList.find('.nothing-here-activity').remove();

        activityList.hide();
        activityList.prepend(html).fadeIn(1000);
    }

    function countLength(div) {
        return div.length;
    }

    function getLengthAfterAjax() {
        return $('.activity-feed-list .activity-item').length;
    }

    var url = '/activities/get-latest';

    var activityList = $('.activity-feed-list');
    var activityItems = activityList.find('.activity-item');
    var activityItemsCount = countLength(activityItems);

    setInterval(function () {
        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (result.status) {
                    if (result.count > 0) {
                        if (activityItemsCount < 10) {
                            pushActivity(activityList, result.html);

                            activityItemsCount = getLengthAfterAjax();
                        } else {
                            $('.activity-feed-list .activity-item').slice(-result.count).remove();

                            pushActivity(activityList, result.html);

                            activityItemsCount = getLengthAfterAjax();
                        }
                    }
                } else {
                    errorMessage();
                }
            },
            error: function () {
                errorMessage();
            }
        });
    }, 600000);
});
