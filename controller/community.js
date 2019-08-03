$(document).ready(function() {



    $(document).on("click", ".showRealUploader", function() {
        var postUploader = $(".realuploaderContainer");
        postUploader.css("display", "flex");
    });

    $(document).on("click", ".cancelPostUpload", function() {
        var postUploader = $(".realuploaderContainer");
        postUploader.css("display", "none");
    });

});