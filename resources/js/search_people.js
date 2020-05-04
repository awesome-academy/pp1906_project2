import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('.search-people-input').on('keyup', function () {
        var inputString = $(this).val();
        var url = '/search-people?name=' + inputString;

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (inputString.length === 0) {
                    $('.search-people-result').hide();
                } else {
                    $('.search-people-result').show();
                    $('.search-people-result').html(result.html);
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });
});
