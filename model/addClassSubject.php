<?php

require_once("auth.php");
require_once("db_con.php");
require_once("getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

$newSubject=$_POST['newSubject'];

$addQuery="INSERT INTO utclassSubjects(userid,classSubject) VALUES('$UTuserid','$newSubject')";
$addsub=mysqli_query($con,$addQuery);
if($addsub){
    echo true;
}

?>