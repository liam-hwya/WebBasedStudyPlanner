<?php

require_once("auth.php");
require_once("db_con.php");
require_once("getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

$teacherName=mysqli_real_escape_string($con,$_POST['teacherName']);
$teacherSubject=mysqli_real_escape_string($con,$_POST['teacherSubject']);
$teacherPhone=mysqli_real_escape_string($con,$_POST['teacherPhone']);

$addQuery="INSERT INTO utteachers(userid,teacherName,teacherSubject,teacherPhone) VALUES('$UTuserid','$teacherName','$teacherSubject','$teacherPhone')";
$addteacher=mysqli_query($con,$addQuery);
if($addteacher){
    echo true;
}

?>