import { ajaxSetup } from './functions.js';

$(document).ready(function () {
    ajaxSetup();

    var changed = false;

    $('.edit-post-form').change(function () {
        changed = true;
    });

    $('.edit-post-form').submit(function () {
        if (!changed && $('.edit-image-input').val() == "") {
            nothingChanges();

            return false;
        } else if ($(this).find('.edit-post-textarea').val() == '') {
            errorEmptyContent();

            return false;
        }
    });

    $('.edit-post-modal').on('shown.bs.modal', function () {
        var postId = $(this).data('post-id');

        var url = '/posts/' + postId + '/get-images';

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            success: function (result) {
                if (result.html.length != 0) {
                    $('.edit-image-holder.post-' + postId).html(result.html);
                }
            },
            error: function () {
                errorMessage();
            }
        });
    });

    $('.edit-post-modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');

        $('.remove-image').hide();

        $(this).find('.edit-image-holder').empty();

        $(this).find('.edit-image-input').val('');
    })


    $('body').on('change', '.edit-image-input', function (event) {
        event.preventDefault();

        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var imgSize = $(this).get(0).files[0].size;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var edit_image_holder = $(this).parent().parent().parent().parent().prev();

        edit_image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {
                if (imgSize < 2048000) {
                    //loop for each file selected for uploaded.
                    for (var i = 0; i < countFiles; i++) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "thumb-image"
                            }).appendTo(edit_image_holder);
                        }
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                    edit_image_holder.show();

                    $('.remove-image').show();
                } else {
                    errorImageSize();
                }

            } else {
                alert("This browser does not support FileReader.");
            }
        } else {
            errorImages();
        }
    });

    $('body').on('click', '.remove-image', function (event) {
        event.preventDefault();

        var postId = $(this).data('post-id');

        $('.edit-image.post-' + postId).html('');

        $('.edit-image-input').val('');

        $(this).hide();
    });

    $('body').on('change', "#upload-image", function (event) {
        event.preventDefault();

        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var imgSize = $(this).get(0).files[0].size;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $(this).parent().parent().parent().prev();

        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {
                //loop for each file selected for uploaded.
                if (imgSize < 2048000) {
                    for (var i = 0; i < countFiles; i++) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "thumb-image"
                            }).appendTo(image_holder);
                        }
                        image_holder.show();

                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    errorImageSize();
                }

            } else {
                alert("This browser does not support FileReader.");
            }
        } else {
            errorImages();
        }
    });
});
