<?php

require_once("auth.php");
require_once("db_con.php");
$subid=$_POST['subid'];

$delQuery="DELETE FROM utsubjects WHERE id='$subid'";
$del=mysqli_query($con,$delQuery);
if($del){
    echo "Deleted";
}else{
    echo "Some Thing Want Wring";
}

?>