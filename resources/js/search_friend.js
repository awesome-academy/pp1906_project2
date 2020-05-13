import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    var page = 1;

    $(window).scroll(function () {
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
                if (result.html.length != 0) {
                    $(".search-friend-result").append(result.html);
                }
            },
            error: function () {
                errorMessage();
            }
        });
    }

    function findFriends(inputString, userName) {

        var url = '/' + userName + '/friends/search?name=' + inputString;

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (result.count > 0) {
                    $('.search-friend-result').html(result.html);
                } else {
                    resultNotFound();
                }
            },
            error: function () {
                errorMessage();
            }
        });
    }

    $('body').on('click', '.search-friends', function () {
        var inputString = $(this).prev().val();
        var userName = $(this).data('user-name');

        findFriends(inputString, userName);
    });

    $('body').on('keypress', '.search-friend-form', function (event) {
        if (((event.keyCode || event.which) == 13) && !event.shiftKey) {
            event.preventDefault();

            var inputString = $(this).val();
            var userName = $(this).data('user-name');

            findFriends(inputString, userName);
        }
    });
});
