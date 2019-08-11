<?php

require_once("auth.php");
require_once("db_con.php");
$postid=$_POST['postid']; 

$delQuery="DELETE FROM utposts WHERE id='$postid'";
$del=mysqli_query($con,$delQuery);
if($del){
    echo "deleted";
}

?>