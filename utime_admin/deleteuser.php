<?php

session_start();
    if(!$_SESSION['UTadmin']){
        header("location:login.php");
	}
    require_once("../model/db_con.php");
    
    $userid=$_GET['id'];
    $delQuery="DELETE FROM utusers WHERE id='$userid'";
    $del=mysqli_query($con,$delQuery);
    if($del){
        header("location:index.php");
    }

?>