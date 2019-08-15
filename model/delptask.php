<?php

require_once("auth.php");
require_once("db_con.php");
$id=$_POST['id'];
$target=$_POST['target'];

if($target=="task"){
    $delQuery="DELETE FROM utptask WHERE id='$id'";
    $del=mysqli_query($con,$delQuery);
    if($del){
        $getSubsquer="SELECT * FROM utpsubtask WHERE taskid='$id'";
        $getSub=mysqli_query($con,$getSubsquer);
        if(mysqli_num_rows($getSub)>0){
            $delsubQuer="DELETE FROM utpsubtask WHERE taskid='$id'";
            $delsub=mysqli_query($con,$delsubQuer);
            if($delsub){
                echo true;
            }
        }else{
            echo true;
        }
    }
}elseif($target=="subtask"){
    $delQuery="DELETE FROM utpsubtask WHERE id='$id'";
    $del=mysqli_query($con,$delQuery);
    if($del){
        echo true;
    }
}

?>