<?php

require_once("auth.php");
require_once("db_con.php");

$projectid=$_POST['projectid'];
$status=$_POST['status'];

$updateProjectQuery="UPDATE utproject SET projectStatus='$status' WHERE id='$projectid'";
    $updateProject=mysqli_query($con,$updateProjectQuery);
    if($updateProject){
        echo true;
    }

?>