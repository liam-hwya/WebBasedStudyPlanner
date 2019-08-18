<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');
$subject=$_POST['subject'];
$message=$_POST['message'];
$starcount=$_POST['starcount'];

$checkuserQuery="SELECT * FROM utfeedback WHERE userid='$UTuserid'";
$checkuser=mysqli_query($con,$checkuserQuery);
if(mysqli_num_rows($checkuser)>0){
    $updateFeedbackQuery="UPDATE utfeedback SET fbsubject='$subject',fbmessage='$message',starcount='$starcount' WHERE userid='$UTuserid'";
    $updateFeedBack=mysqli_query($con,$updateFeedbackQuery);
    if($updateFeedBack){
        echo true;
    }
}else{
    $addFeedBackQuery="INSERT INTO utfeedback(fbsubject,fbmessage,userid,starcount) VALUES ('$subject','$message','$UTuserid','$starcount')";
    $addFeedback=mysqli_query($con,$addFeedBackQuery);
    if($addFeedback){
        echo true;
    }
}

?>