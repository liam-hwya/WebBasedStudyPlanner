<?php
    
    require_once("../model/auth.php");
    require_once("../model/db_con.php");
    require_once("../model/getuserdatas.php");
    $_SESSION['pagename']="community";
    $UTuser=$_SESSION['UTuser'];
    $UTuserid=userData($UTuser,'id');

    $firstName=userData($UTuser,'firstName');
    $lastName=userData($UTuser,'lastName');
    $name=$firstName." ".$lastName;
    $profilePicture=userData($UTuser,'profilePicture');


    
?>

<div class="communityMainContainer">
    <div class="questionFeedContainer">

    <!-- Category Selector start -->
        
        <div class="categorySelectorContainer">
                <div class="showCommunitySideBarBtn"><img src="assets/icons/menu.png"></div>
                <?php
                    $getPassions="SELECT * FROM utusers WHERE id='$UTuserid'";
                    $Passions=mysqli_query($con,$getPassions);
                    while($row=mysqli_fetch_assoc($Passions)){
                        $categories=unserialize($row['passions']);
                        foreach($categories as $category){
                            echo "<div class='categorytoSelectInCommunity'>".$category."</div>";
                        }
                        
                    }
                ?>
                <div class='showAllCategoriesInCommunity showingAllCats'>All</div>
        </div>
    <!-- Category Selector start -->


        <div class="communityPostContainer">
            <!-- other users post will appear here -->
            <script>
                catlist = [];
                var showPostCount = 7;
                $(".communityPostContainer").load("model/getPosts.php", {
                    categories: catlist,
                    showPostCount:showPostCount
                });
                $(".communityMyArticles").load("model/getsavedpost.php");
            </script>
        </div>
        <div class="comunityPostDetailContainer">
            
        </div>

    </div>

    <!-- search aera start -->
    <div class="communitySideContainer">
        <div class="communitySideHeader">
            <div class="hideCommunitySearch"><img src="assets/icons/back.png"></div>
            <div class="communitySearch">
                <input type="text" placeholder="Search" class="communitySearchInput">
                <!-- <div class="communitySearchBtn"><img src="assets/icons/search.png" alt=""></div> -->
            </div>
        </div>
        <div class="communitySearchResultContainer"></div><!--Search Result Holder-->
        <div class="communityMyArticles">
            
        </div>
        
    </div> 
    <div class="addNewArticleBtn">
            <span>Add Article</span>
            <div class="addNewArticleIcon"><img src="assets/icons/add.png" alt=""></div>
    </div> 
    <!-- search area end -->

    <!-- popup uploader start -->
    <div class="realuploaderContainer">
        <div class="realuploaderbox">
            <div class="postUPloaderPpContainer">
                <div class="uploaderPp"><img src="assets/images/<?php echo $profilePicture; ?>"></div>
                <div class="uploaderName"><?php echo $name; ?></div>
                <div class="theSpaceBetweenNameNcancel"></div>
                <div class="cancelPostUpload"><img src="assets/icons/cancel.png" alt=""></div>
            </div>
            <input type="text" class="postUploaderTitle" placeholder="Title">
            <textarea class="postUploaderTextbox"></textarea>
            <!-- <div class="postUploadImagePreview"></div> -->
            <div class="postUploaderControls">
                <select class="postUploaderCategorySelector select-css">
                    <?php
                        $getPassions="SELECT * FROM utpassions";
                        $Passions=mysqli_query($con,$getPassions);
                        while($row=mysqli_fetch_assoc($Passions)){
                            echo "<option value='".$row['passions']."'>".$row['passions']."</option>";
                        }
                    ?>
                </select>
                <!-- <input type="file" multiple class="fileselectorForPostUpload"> -->
                <!-- <img src="assets/icons/addimg.png" class="instantFSforFupload" alt=""> -->
                <div class="uploadPostBtn" data-uid="<?php echo $UTuserid; ?>">Publish</div>
            </div>
        </div>
    </div>
    <!-- popup uploader end -->

    <div class="articlePopupMenu">
        thisis
    </div>

</div>