<?php

require_once("auth.php");
require_once("db_con.php");

$subTaskid=$_POST['subTaskid'];
$todo=$_POST['todo'];

if($todo=="check"){
    $status=1;
}else{
    $status=0;
}

$updateQuery="UPDATE utpsubtask SET subtaskStatus='$status' WHERE id='$subTaskid'";
$update=mysqli_query($con,$updateQuery);
if($update){
    echo true;
}


?>