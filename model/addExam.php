<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

$examName=$_POST['examName'];
$examDate=$_POST['examDate'];
$examStatus=0;

$addQuery="INSERT INTO utexam(userid,examName,examDate,examStatus) VALUES('$UTuserid','$examName','$examDate','$examStatus')";
$addExam=mysqli_query($con,$addQuery);
if($addExam){
    echo true;
}


?>