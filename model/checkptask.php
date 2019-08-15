<?php

require_once("auth.php");
require_once("db_con.php");

$todo=$_POST['todo'];
$taskid=$_POST['taskid'];

if($todo=="check"){
    $status=1;
}else{
    $status=0;
}

$updateQuery="UPDATE utptask SET ptaskStatus='$status' WHERE id='$taskid'";
$update=mysqli_query($con,$updateQuery);
if($update){
    echo true;
}

?>