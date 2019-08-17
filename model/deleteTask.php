
<?php

require_once("auth.php");
require_once("db_con.php");

$taskid=$_POST['taskid'];

$delQuery="DELETE FROM uttask WHERE id='$taskid'";
$del=mysqli_query($con,$delQuery);
if($del){
    echo true;
}

?>