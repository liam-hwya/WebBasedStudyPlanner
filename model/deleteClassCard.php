<?php

require_once("auth.php");
require_once("db_con.php");

$target=$_POST['target'];
$cardid=$_POST['cardid'];

$deleteQuery="DELETE FROM $target WHERE id='$cardid'";
    $delete=mysqli_query($con,$deleteQuery);
    if($delete){
        echo true;
    }

?>