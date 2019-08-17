<?php

require_once("auth.php");
require_once("db_con.php");
require_once("getuserdatas.php");
$UTuserEmail=$_SESSION['UTuser'];
$UTuserid=userData($UTuserEmail,'id');

$time=date('Hmsa');

$type=$_FILES['newpp']['type'];
$tmp_name=$_FILES['newpp']['tmp_name'];
$name=$time.$_FILES['newpp']['name'];




if($type=="image/jpeg" || $type=="image/png" || $type=="image/jpg" || $type=="image/gif"){
    $updatePpQuery="UPDATE utusers SET profilePicture='$name' WHERE id='$UTuserid'";
    $updatePp=mysqli_query($con,$updatePpQuery);
    if($updatePp){
        move_uploaded_file($tmp_name,"../assets/images/".$name);
    }
}

?>