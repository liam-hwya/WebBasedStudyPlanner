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
        </div>
    <!-- Category Selector start -->


        <div class="postUploader">
            <div class="postUPloaderPpContainer">
                <div class="uploaderPp"><img src="assets/images/<?php echo $profilePicture; ?>"></div>
                <div class="uploaderName"><?php echo $name; ?></div>
            </div>  
            <div class="postUploaderInputContainer">
                <input type="text" class="uploaderTextbox showRealUploader" placeholder="Any Question" readonly>
                <div class="uploaderControls">
                    <img src="assets/icons/addimg.png" class="showRealUploader" alt="">
                </div>
            </div>
        </div>

        <div class="communityPostContainer">
            <!-- other users post will appear here -->
        </div>

    </div>

    <!-- search aera start -->
    <div class="communitySideContainer">
        <div class="communitySearch">
            <input type="text" placeholder="Search" class="communitySearchInput">
            <div class="communitySearchBtn"><img src="assets/icons/search.png" alt=""></div>
        </div>
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
            <div class="postUploaderTextbox" contenteditable="true" ondragenter="return false;" ondragleave="return false;" ondragover="return false;" ondrop="return false;"></div>
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

</div>