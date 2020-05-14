import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();
    //first pagination post start at 0, the second pagination post will start at 1
    var page = 1;

    $(window).on('scroll', function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        var url = '?page=' + page;

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (result.html.length == 0) {
                    $('.no-more').show();
                }
                $(".post-data").append(result.html);

                zoomImage();
                zoomGallery();
            },
            error: function () {
                errorMessage();
            }
        });
    }
});
