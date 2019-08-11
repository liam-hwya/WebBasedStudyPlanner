<?php

    require_once("auth.php");
    require_once("db_con.php");
    require_once("../model/getuserdatas.php");
    $UTuser=$_SESSION['UTuser'];
    $UTuserid=userData($UTuser,'id');

    $postid=$_POST['postid'];
    $opid=$_POST['opid'];

    if($opid==$UTuserid){
        echo "<div class='deleteThisPost' data-postid='".$postid."'>Delete</div>";
    }else{
        $getSavedQuery="SELECT * FROM saved WHERE userid='$UTuserid' AND postid='$postid'";
        $Saved=mysqli_query($con,$getSavedQuery);
        if(mysqli_num_rows($Saved)>0){
            $todo="Unsave";
        }else{
            $todo="Save";
        }
        echo "<div class='saveThisPost' data-todo='".$todo."'  data-postid='".$postid."'>".$todo."</div>";
    }

?>