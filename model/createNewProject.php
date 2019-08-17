<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');
$modified=date("Y-m-d");

$projectName=$_POST['projectName'];
$projectDate=$_POST['projectDate'];
$projectDescription=mysqli_real_escape_string($con,$_POST['projectDescription']);
$projectStatus=0;

$addQuery="INSERT INTO utproject(userid,projectName,projectDescription,deadline,projectStatus,projectPrograss,modifiedTime) VALUES('$UTuserid','$projectName','$projectDescription','$projectDate','$projectStatus','0','$modified')";
$addproject=mysqli_query($con,$addQuery);
if($addproject){
    echo true;
}

?>