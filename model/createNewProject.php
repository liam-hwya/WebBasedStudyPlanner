<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

$projectName=$_POST['projectName'];
$projectDate=$_POST['projectDate'];
$projectStatus=0;

$addQuery="INSERT INTO utproject(userid,projectName,deadline,projectStatus) VALUES('$UTuserid','$projectName','$projectDate','$projectStatus')";
$addproject=mysqli_query($con,$addQuery);
if($addproject){
    echo true;
}

?>