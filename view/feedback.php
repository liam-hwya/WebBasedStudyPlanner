<?php
    require_once("../model/auth.php");
    $_SESSION['pagename']="feedback";
?>


<div class="feedBackMainContainer">
    <div class='utFeedbackFormContainer'>
        <span>We Do Care Your Feedback</span>
        <div class="feedbackStarContainer">
            <img src="assets/icons/star.png" data-starindex='1' class='feedbackStar1 feedbackStar'>
            <img src="assets/icons/star.png" data-starindex='2' class='feedbackStar2 feedbackStar'>
            <img src="assets/icons/star.png" data-starindex='3' class='feedbackStar3 feedbackStar'>
            <img src="assets/icons/star.png" data-starindex='4' class='feedbackStar4 feedbackStar'>
            <img src="assets/icons/star.png" data-starindex='5' class='feedbackStar5 feedbackStar'>
        </div>
        <div class="utfeedbackForm">
            <label>Subject</label>
            <input type="text" class='feedbackSubject'>
            <label>Message</label>
            <textarea class="feedbackMessage"></textarea>
            <div class='feedBackBtnContainer'>
                <div class="feedbackBtn">
                    <img src="assets/icons/messageSend.png">
                    <span>Send</span>
                </div>
            </div>
        </div>
    </div>
</div>