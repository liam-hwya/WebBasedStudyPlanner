<?php

require_once("auth.php");
require_once("db_con.php");

$examid=$_POST['examid'];

$deleteQuery="DELETE FROM utexam WHERE id='$examid'";
    $delete=mysqli_query($con,$deleteQuery);
    if($delete){
        echo true;
    }

?>