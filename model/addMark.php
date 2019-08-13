<?php

require_once("auth.php");
require_once("db_con.php");

$mark=$_POST['submark'];
$subid=$_POST['subid'];

$addMarkQuery="UPDATE utsubjects SET getMark='$mark' WHERE id='$subid'";
$addMark=mysqli_query($con,$addMarkQuery);
if($addMark){
    echo true;
}

?>