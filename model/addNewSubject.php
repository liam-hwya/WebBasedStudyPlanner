<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');   

$examid=$_POST['examid'];
$subject=$_POST['subject'];
$date=$_POST['date'];
$ftime=$_POST['ftime'];
$ttime=$_POST['ttime'];
$roomno=$_POST['roomno'];
$chairno=$_POST['chairno'];
$minmark=$_POST['minmark'];

$addQuery="INSERT INTO utsubjects (examid,utsubject,subjectDate,fromTime,toTime,roomNo,chairNo,minMark)
 VALUES ('$examid','$subject','$date','$ftime','$ttime','$roomno','$chairno','$minmark')";
 $addSub=mysqli_query($con,$addQuery);
 if($addSub){
     echo true;
 }

?>