<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');
$postid=$_POST['postid'];
$todo=$_POST['todo'];

if($todo=="Save"){
    $saveQuery="INSERT INTO saved (userid,postid) VALUES('$UTuserid','$postid')";
    $save=mysqli_query($con,$saveQuery);
    if($save){
        echo "Saved";
    }
}else{
    $delQuery="DELETE FROM saved WHERE postid='$postid' AND userid='$UTuserid'";
    $del=mysqli_query($con,$delQuery);
    if($del){
        echo "Removed";
    }
}
?>