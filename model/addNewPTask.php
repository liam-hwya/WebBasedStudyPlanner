<?php

require_once("auth.php");
require_once("db_con.php");

$projectid=$_POST['projectid'];
$addNewTaskText=$_POST['newTaskText'];
$status=0;

$addNewTaskQuery="INSERT INTO utptask(projectid,ptask,ptaskStatus) VALUES('$projectid','$addNewTaskText','$status')";
$addNewTask=mysqli_query($con,$addNewTaskQuery);
if($addNewTask){
    echo true;
}

?>