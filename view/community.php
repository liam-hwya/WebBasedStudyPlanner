<?php
    
    require_once("../model/auth.php");
    require_once("../model/getuserdatas.php");
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

        <div class="questionsContainer">
            
            <div class="thisPost">
                <div class="postHeader">
                    <div class="postProfilePicture"><img src="assets/images/nopp.png"></div>
                    <div class="postData">
                        <div class="postUserName">Htet Waiyan Aung</div>
                        <div class="postTime">2019 May,22</div>
                    </div>
                    <div class="postSetting">?</div>
                </div>
                <div class="postText">

                Definition
AI (artificial intelligence)
Posted by: Margaret Rouse
WhatIs.com
Contributor(s): Ed Burns and Nicole Laskowski

Artificial intelligence (AI) is the simulation of 
human intelligence processes by machines, especially computer systems. 
<span>Continute reading .....</span>

                </div>
                <div class="postImage"><img src="assets/images/temp.jpg"></div>
                <div class="postControl">
                    <div class="postLike">Like</div>
                    <div class="postComment">Comment</div>
                </div>
            </div>





            <div class="thisPost">
                <div class="postHeader">
                    <div class="postProfilePicture"><img src="assets/images/nopp.png"></div>
                    <div class="postData">
                        <div class="postUserName">Htet Waiyan Aung</div>
                        <div class="postTime">2019 May,22</div>
                    </div>
                    <div class="postSetting">?</div>
                </div>
                <div class="postText">

                Definition
AI (artificial intelligence)
Posted by: Margaret Rouse
WhatIs.com
Contributor(s): Ed Burns and Nicole Laskowski

Artificial intelligence (AI) is the simulation of 
human intelligence processes by machines, especially computer systems. 
<span>Continute reading .....</span>

                </div>
                <div class="postImage"><img src="assets/images/temp.jpg"></div>
                <div class="postControl">
                    <div class="postLike">Like</div>
                    <div class="postComment">Comment</div>
                </div>
            </div>




        </div>

    </div>
    <div class="communitySideContainer">
                <div class="communitySearch">
                    <input type="text" placeholder="Search" class="communitySearchInput">
                    <div class="communitySearchBtn"><img src="assets/icons/search.png" alt=""></div>
                </div>
                <div class="postHeader">
                    <div class="postProfilePicture"><img src="assets/images/nopp.png"></div>
                    <div class="postData">
                        <div class="postUserName">Htet Waiyan Aung</div>
                        <div class="postTime">2019 May,22</div>
                    </div>
                </div>
                <br>
                <div class="postHeader">
                    <div class="postProfilePicture"><img src="assets/images/nopp.png"></div>
                    <div class="postData">
                        <div class="postUserName">Htet Waiyan Aung</div>
                        <div class="postTime">2019 May,22</div>
                    </div>
                </div>
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
                <input type="file" multiple class="fileselectorForPostUpload">
                <img src="assets/icons/addimg.png" class="instantFSforFupload" alt="">
                <div class="uploadPostBtn">Publish</div>
            </div>
        </div>

    </div>
</div>