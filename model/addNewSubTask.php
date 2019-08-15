<?php

    
require_once("auth.php");
require_once("db_con.php");

$ptaskid=$_POST['ptaskid'];
$newTaskText=$_POST['newtaskText'];
$projectid=$_POST['projectid'];
$status=0;

$addSubtaskQuery="INSERT INTO utpsubtask(projectid,taskid,subtask,subtaskStatus) VALUES('$projectid','$ptaskid','$newTaskText','$status')";
$addSubtask=mysqli_query($con,$addSubtaskQuery);
if($addSubtask){
    echo true;
}

?>