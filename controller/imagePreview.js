$(document).ready(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
            console.log(input.files);

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $(document).on('change', '.fileselectorForPostUpload', function() {
        $(".postUploadImagePreview").html("");
        imagesPreview(this, 'div.postUploadImagePreview');


    });
});