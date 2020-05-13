import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    $('.search-people-result').hide();

    $('.search-people-input').on('keyup', function () {
        var inputString = $(this).val();
        if (inputString) {
            var url = '/search-people?name=' + inputString;

            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                success: function (result) {
                    if (result.count > 0) {
                        var resultDropdown = $('.search-people-result');

                        resultDropdown.show();
                        resultDropdown.html(result.html);
                    } else {
                        $('.search-people-result').hide();
                    }
                },
                error: function () {
                    errorMessage();
                }
            });
        } else {
            $('.search-people-result').hide();
        }
    });
});
