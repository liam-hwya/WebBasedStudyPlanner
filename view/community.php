<?php
    
    include("../model/auth.php");
    include("../model/getuserdatas.php");
    $_SESSION['pagename']="community";
    $UTuser=$_SESSION['UTuser'];
    $firstName=userData($UTuser,'firstName');
    $lastName=userData($UTuser,'lastName');
    $name=$firstName." ".$lastName;
    $profilePicture=userData($UTuser,'profilePicture');


    
?>

<div class="communityMainContainer">
    <div class="questionFeedContainer">
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
    </div>
    <div class="communitySideContainer">
        data
    </div>  
    <div class="realuploaderContainer">

    
        <div class="realuploaderbox">
            <div class="postUPloaderPpContainer">
                <div class="uploaderPp"><img src="assets/images/<?php echo $profilePicture; ?>"></div>
                <div class="uploaderName"><?php echo $name; ?></div>
                <div class="theSpaceBetweenNameNcancel"></div>
                <div class="cancelPostUpload"><img src="assets/icons/cancel.png" alt=""></div>
            </div>
            <div class="postUploaderTextbox" contenteditable="true" ondragenter="return false;" ondragleave="return false;" ondragover="return false;" ondrop="return false;"></div>
            <div class="postUploadImagePreview"></div>
            <div class="postUploaderControls">
                <img src="assets/icons/addimg.png" class="showRealUploader" alt="">
                <div class="uploadPostBtn">Publish</div>
            </div>
        </div>

    </div>
</div>