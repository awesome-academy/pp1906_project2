$(document).ready(function () {
    $('body').on('click', '.store-post', function (event) {
        event.preventDefault();

        var content = $(this).parent().prev().prev().find('.post-content').val();

        if (content == '') {
            errorEmptyContent();
        } else {
            $('.post-form-submit').submit();
        }
    });
});
