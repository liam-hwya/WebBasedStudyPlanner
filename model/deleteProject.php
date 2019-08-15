<?php

require_once("auth.php");
require_once("db_con.php");

$projectid=$_POST['projectid'];

$deleteQuery="DELETE FROM utproject WHERE id='$projectid'";
    $delete=mysqli_query($con,$deleteQuery);
    if($delete){
        echo true;
    }

?>