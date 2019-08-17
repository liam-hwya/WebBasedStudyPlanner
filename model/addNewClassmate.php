<?php

require_once("auth.php");
require_once("db_con.php");
require_once("getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

$classmateName=mysqli_real_escape_string($con,$_POST['classmateName']);
$classmatePhone=mysqli_real_escape_string($con,$_POST['classmatePhone']);
$classmateAddress=mysqli_real_escape_string($con,$_POST['classmateAddress']);

$addQuery="INSERT INTO utclassmate(userid,classmateName,classmatePhone,classmateAddress) VALUES('$UTuserid','$classmateName','$classmatePhone','$classmateAddress')";
$addclassmate=mysqli_query($con,$addQuery);
if($addclassmate){
    echo true;
}

?>