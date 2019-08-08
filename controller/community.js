$(document).ready(function() {



    $(document).on("click", ".showRealUploader", function() {
        var postUploader = $(".realuploaderContainer");
        postUploader.css("display", "flex");
    });

    $(document).on("click", ".cancelPostUpload", function() {
        var postUploader = $(".realuploaderContainer");
        postUploader.css("display", "none");
    });

    $(document).on("click", ".instantFSforFupload", function() {
        $(".fileselectorForPostUpload").click();
    });



    function getPosts(categories) {
        $(".communityPostContainer").load("model/getPosts.php", {
            categories: categories
        });
    }

    $(document).on("click", ".uploaderPp", function() {
        // var catlist = ['Space', 'Design', 'Physic'];
        var catlist = [];
        if (catlist.length == 0) {
            catlist = "";
        }
        getPosts(catlist);
    });



    $(document).on("click", ".uploadPostBtn", function() {
        var Title = $(".postUploaderTitle").val();
        var Description = $(".postUploaderTextbox").html();
        var category = $(".postUploaderCategorySelector").val();
        var userid = $(this).attr("data-uid");
        $.post("model/postUploader.php", {
            title: Title,
            description: Description,
            category: category,
            userid: userid
        }, function(data, status) {
            if (data == 1) {
                alert("post uploader");
            } else {
                alert("someting want wrong");
            }
        });
        $(".realuploaderContainer").css("display", "none");
        $(".postUploaderTextbox").text("");
        $(".postUploaderTitle").val("");
    });


});