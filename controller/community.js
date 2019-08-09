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
    function getPosts(categories) {
        $(".communityPostContainer").load("model/getPosts.php", {
            categories: categories
        });
    }

    var catlist = [];//categories list to show
    //select categories to show
    $(document).on("click",".categorytoSelectInCommunity",function(){ 
        if($(this).hasClass("selectedCat")){
            $(this).removeClass("selectedCat");
            var removeCat = $(this).html();
            var index = catlist.indexOf(removeCat);
            catlist.splice(index, 1);
        }else{
            var newCat = $(this).html();
            $(this).addClass("selectedCat");
            catlist.push(newCat);
        }
        if(catlist.length==0){
             $(".showAllCategoriesInCommunity").addClass("showingAllCats");
        }else{
            $(".showAllCategoriesInCommunity").removeClass("showingAllCats");
        }
        getPosts(catlist);
    });

    //For "All" btn in category selector
    $(document).on("click",".showAllCategoriesInCommunity",function(){
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
            } else {
                alert("someting want wrong");
            }
        });
        $(".realuploaderContainer").css("display", "none");
        $(".postUploaderTextbox").text("");
        $(".postUploaderTitle").val("");
    });


    //search
    $(document).on("keyup",".communitySearchInput",function(){
        $(".communitySearchResultContainer").css("display","block");
        var keyword=$(this).val();
        $(".communitySearchResultContainer").load("model/search.php",{
            keyword:keyword
        });
        if(keyword==""){
            $(".communitySearchResultContainer").css("display","none");
        }
    });

    $(document).on("blur",".communitySearchInput",function(){
        $(".communitySearchResultContainer").css("display","none");
    });



    //post controls
    //post read more
    $(document).on("click",".readMorethisPost",function(){
        var postid=$(this).attr("data-postid");
        $(this).parent().load("model/readmore.php",{
            postid:postid
        });
    });

    //post Star btn
    $(document).on("click",".thisArticleStars",function(){
        var postid=$(this).attr("data-postId");
        if($(this).hasClass("beforestar")){
            $(this).addClass('afterstar');
            $(this).removeClass('beforestar');
            var todo="add";
        }else{
            $(this).addClass('beforestar');
            $(this).removeClass('afterstar');
            var todo="remove";
        }
        $(this).load("model/star.php",{
            postid:postid,
            todo:todo
        });
    });

});