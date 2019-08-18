$(document).ready(function() {



    $(document).on("click", ".addNewArticleBtn", function() {
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

    //get post by category
    var catlist = []; //categories list to show

    var showPostCount = 7; //post count to show

    function getPosts(categories) {
        $(".communityPostContainer").load("model/getPosts.php", {
            categories: categories,
            showPostCount: showPostCount
        });
    }

    $(document).on("click", ".lodeMorePostBtn", function() {
        showPostCount = showPostCount + 5;
        getPosts(catlist);
    });



    //select categories to show
    $(document).on("click", ".categorytoSelectInCommunity", function() {
        if ($(this).hasClass("selectedCat")) {
            $(this).removeClass("selectedCat");
            var removeCat = $(this).html();
            var index = catlist.indexOf(removeCat);
            catlist.splice(index, 1);
        } else {
            var newCat = $(this).html();
            $(this).addClass("selectedCat");
            catlist.push(newCat);
        }
        if (catlist.length == 0) {
            $(".showAllCategoriesInCommunity").addClass("showingAllCats");
        } else {
            $(".showAllCategoriesInCommunity").removeClass("showingAllCats");
        }
        getPosts(catlist);
    });

    //For "All" btn in category selector
    $(document).on("click", ".showAllCategoriesInCommunity", function() {
        $(this).addClass("showingAllCats");
        $(".categorytoSelectInCommunity").removeClass("selectedCat");
        catlist = [];
        getPosts(catlist);
    });




    //Upload Post
    $(document).on("click", ".uploadPostBtn", function() {
        var Title = $(".postUploaderTitle").val();
        var Description = $(".postUploaderTextbox").val();
        var category = $(".postUploaderCategorySelector").val();
        var userid = $(this).attr("data-uid");
        $.post("model/postUploader.php", {
            title: Title,
            description: Description,
            category: category,
            userid: userid
        }, function(data, status) {
            if (data == 1) {
                getPosts(catlist);
                recoreAlert("Successfully Uploaded", 1);
            } else {
                recoreAlert("Opps! Something is Wrong..", 0);
            }
        });
        $(".realuploaderContainer").css("display", "none");
        $(".postUploaderTextbox").val("");
        $(".postUploaderTitle").val("");
    });


    //search
    $(document).on("keyup", ".communitySearchInput", function() {
        $(".communitySearchResultContainer").css("display", "flex");
        var keyword = $(this).val();
        $(".communitySearchResultContainer").load("model/search.php", {
            keyword: keyword
        });
        if (keyword == "") {
            $(".communitySearchResultContainer").css("display", "none");
        }
    });





    //post controls
    //view post detail
    function viewPostDetail(postid, curpos) {
        $(".comunityPostDetailContainer").css("display", "flex");
        $(".communityPostContainer").toggle();
        $(".comunityPostDetailContainer").load("model/viewPostDetail.php", {
            postid: postid,
            curpos: curpos
        });
        $(".Utime_main_body").scrollTop(0);
    }
    $(document).on("click", ".viewPostDetailBtn", function() {
        var currentPos = $(".Utime_main_body").scrollTop();
        var postid = $(this).attr("data-postid");
        viewPostDetail(postid, currentPos);
        $(".categorySelectorContainer").toggle();
    });


    //add comment   
    $(document).on("click", ".addCommentBtn", function() {
        var postid = $(this).attr("data-postid");
        var comment = $(".addCommentInputBox").val();
        if (comment != "") {
            $(".articleDetailAllComentContainer").load("model/getComments.php", {
                postid: postid,
                comment: comment
            });
            $(".thisArticleComment").load("model/getCommentCount.php", {
                postid: postid
            });
        } else {
            alert("empty Comment");
        }
    })



    //back from post detail
    $(document).on("click", ".backFromPostDetail", function() {
        var curpos = $(this).attr('data-curpos');
        $(".comunityPostDetailContainer").css("display", "none");
        $(".communityPostContainer").toggle();
        $(".categorySelectorContainer").toggle();

        $(".communityPostContainer").load("model/getPosts.php", {
            categories: catlist,
            showPostCount: showPostCount
        });

        $(".Utime_main_body").scrollTop(curpos);
    });

    //post Star btn
    $(document).on("click", ".thisArticleStars", function() {
        var postid = $(this).attr("data-postId");
        if ($(this).hasClass("beforestar")) {
            $(this).addClass('afterstar');
            $(this).removeClass('beforestar');
            var todo = "add";
        } else {
            $(this).addClass('beforestar');
            $(this).removeClass('afterstar');
            var todo = "remove";
        }
        $(this).load("model/star.php", {
            postid: postid,
            todo: todo
        });
    });

    //article menu btn
    $(document).on("click", ".articleMenu", function(e) {
        var opid = $(this).attr("data-uid");
        var postid = $(this).attr("data-postid");
        var menu = $(".articlePopupMenu");
        menu.toggle();
        var x = e.pageX + 20;
        var y = e.pageY - 5;
        menu.css("top", y);
        menu.css("left", x);
        menu.load("model/articleMenu.php", {
            opid: opid,
            postid: postid
        });
    });

    $(".Utime_main_body").on("scroll", function() {
        var menu = $(".articlePopupMenu");
        menu.css("display", "none");
    });


    //hid search
    $(document).on("click", ".hideCommunitySearch", function() {
        $(".communitySideContainer").toggle();
        $(".questionFeedContainer").toggle();
    });
    $(document).on("click", ".showCommunitySideBarBtn", function() {
        $(".communitySideContainer").toggle();
        $(".questionFeedContainer").toggle();
    });


    //post Save 
    $(document).on("click", ".saveThisPost", function() {
        var postid = $(this).attr("data-postid");
        var todo = $(this).attr("data-todo");
        $.post("model/save.php", {
            postid: postid,
            todo: todo
        }, function(data, status) {
            recoreAlert(data, 1);
        });
        $(".articlePopupMenu").toggle();
        loadSavedPosts();
    });

    //delete Post
    $(document).on("click", ".deleteThisPost", function() {
        var postid = $(this).attr('data-postid');
        $.post("model/postdelete.php", {
            postid: postid
        }, function(data, status) {
            recoreAlert("Post Deleted", 1);
        });
        $(".articlePopupMenu").toggle();
        getPosts(catlist);
        recoreAlert("Post Deleted", 1);
    });


    //get Saved Post
    function loadSavedPosts() {
        $(".communityMyArticles").load("model/getsavedpost.php");
    }

    //view Saved post
    $(document).on("click", ".savedPostContainer", function() {
        var currentPos = $(".Utime_main_body").scrollTop();
        var postid = $(this).attr("data-postid");

        $(".questionFeedContainer").css("display", "block");
        $(".comunityPostDetailContainer").css("display", "flex");
        $(".communityPostContainer").css("display", "none");
        $(".comunityPostDetailContainer").load("model/viewPostDetail.php", {
            postid: postid,
            curpos: currentPos
        });
        $(".Utime_main_body").scrollTop(0);


        $(".categorySelectorContainer").css("display", "none");
        if ($(window).width() < 768) {
            $('.communitySideContainer').css("display", "none");
        }
    });

    $(document).on("click", ".changeThisCategory", function() {
        var todo = $(this).attr('data-todo');
        var catid = $(this).attr('data-id');
        $.post("model/changeCatList.php", {
            todo: todo,
            catid: catid
        }, function(data, status) {
            //do something
        });
        $(".categorySelectorContainer").load("model/catList.php");
        var catlist = [];
        getPosts(catlist);
        $(".communitySearchResultContainer").css("display", "none");
        $(".communitySearchInput").val("");
    });

    // $(document).on("blur", ".communitySearchInput", function() {
    //     $(".communitySearchResultContainer").css("display", "none");
    // });

});