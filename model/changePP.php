<?php

    require_once("auth.php");
    require_once("db_con.php");
    require_once("getuserdatas.php");
    $UTuserEmail=$_SESSION['UTuser'];
    $UTuserid=userData($UTuserEmail,'id');
    $curTime=date('hms');


    $tempname=$_POST['tempname'];
    $newpp=getimagesize($tempname);
    $imgType=$newpp['mime'];
    if($imgType=="image/jpeg"){
        $ext="jpeg";
    }elseif($imgType=="image/jpg"){
        $ext="jpg";
    }elseif($imgType=="image/png"){
        $ext="png";
    }
    $imagename=$curTime.$UTuserid.".".$ext;

    $target_file="../assets/images/".$imagename;

    if($imgType=="image/jpeg" || $imgType=="image/jpg" || $imgType=="image/png"){
        move_uploaded_file($tempname, $target_file));
    }else{
        echo false;
    }
    
    

    

?>