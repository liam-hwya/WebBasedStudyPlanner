<?php

require_once("auth.php");
require_once("db_con.php");

$taskid=$_POST['taskid'];



$getptaskQuery="SELECT * FROM utptask WHERE id='$taskid'";
$getptask=mysqli_query($con,$getptaskQuery);



if(mysqli_num_rows($getptask)>0){
    while($ptask=mysqli_fetch_assoc($getptask)){
        $ptaskid=$ptask['id'];

    //get subtask count
        $getSubTaskQuery="SELECT * FROM utpsubtask WHERE taskid='$ptaskid'";
        $getSubTask=mysqli_query($con,$getSubTaskQuery);
        $subTaskCount=mysqli_num_rows($getSubTask);

    //get finished subtask count
        $getDoneSubTaskQuery="SELECT * FROM utpsubtask WHERE taskid='$ptaskid' AND subtaskStatus='1'";
        $getDoneSubTask=mysqli_query($con,$getDoneSubTaskQuery);
        $doneSubTaskCount=mysqli_num_rows($getDoneSubTask);

        $ptaskText=$ptask['ptask'];

        if($subTaskCount==0){
            $checkable=" checkable";
        }else{
            $checkable="";
            if($doneSubTaskCount<$subTaskCount){
                $taskCheckImg="assets/icons/beforeCheck.png";
                $updateQuery="UPDATE utptask SET ptaskStatus='0' WHERE id='$ptaskid'";
                $update=mysqli_query($con,$updateQuery);
                $taskStatus="";
            }else{
                $taskCheckImg="assets/icons/afterCheck.png";
                $updateQuery="UPDATE utptask SET ptaskStatus='1' WHERE id='$ptaskid'";
                $update=mysqli_query($con,$updateQuery);
                $taskStatus=" checked";
            }
        }

        
        echo "<img src='".$taskCheckImg."' class='projectTaskControl".$checkable.$taskStatus."'>
                <div class='projectTaskText'>".$ptaskText."</div>";
    }       
}   
?>