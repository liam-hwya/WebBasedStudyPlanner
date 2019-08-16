<?php

    require_once("auth.php");
    require_once("db_con.php");

    $taskid=$_POST['taskid'];
    $status=$_POST['status'];

    $updateQuery="UPDATE uttask SET taskStatus='$status' WHERE id='$taskid'";
    $update=mysqli_query($con,$updateQuery);
    if($update){
        echo true;
    }


?>