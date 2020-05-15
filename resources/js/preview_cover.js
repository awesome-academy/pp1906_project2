$(document).ready(function () {
    $("#upload-cover").on('change', function () {
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var imgSize = $(this).get(0).files[0].size;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#image-holder-cover");
        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {
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
                        $('.btn-photo').show();
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    errorImageSize();
                }
            }
        } else {
            errorImages();
        }
    });
});
