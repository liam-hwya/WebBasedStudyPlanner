<?php

require_once("auth.php");
require_once("db_con.php");
$projectid=$_POST['projectid'];

$getAllQuery="SELECT * FROM utpsubtask WHERE projectid='$projectid'";
$getAll=mysqli_query($con,$getAllQuery);
$subTaskcount=mysqli_num_rows($getAll);

$getFinishSubQuery="SELECT * FROM utpsubtask WHERE projectid='$projectid' AND subtaskStatus='1'";
$getfinishSubtasks=mysqli_query($con,$getFinishSubQuery);
$finishSubtaskCount=mysqli_num_rows($getfinishSubtasks);

$taskcount=0;
$getTasksQuery="SELECT * FROM utptask WHERE projectid='$projectid'";
$getTasks=mysqli_query($con,$getTasksQuery);
if(mysqli_num_rows($getTasks)>0){
    while($task=mysqli_fetch_assoc($getTasks)){
        $taskid=$task['id'];
        $getsubtaskquery="SELECT * FROM utpsubtask WHERE taskid='$taskid'";
        $getsubtask=mysqli_query($con,$getsubtaskquery);
        if(mysqli_num_rows($getsubtask)>0){
            $taskcount=$taskcount;
        }else{
            $taskcount++;
        }
    }
}

$finishTaskCount=0;
$getFinishTasksQuery="SELECT * FROM utptask WHERE projectid='$projectid' AND ptaskStatus='1'";
$getFinishTasks=mysqli_query($con,$getFinishTasksQuery);
if(mysqli_num_rows($getFinishTasks)>0){
    while($task=mysqli_fetch_assoc($getFinishTasks)){
        $taskid=$task['id'];
        $getsubtaskquery="SELECT * FROM utpsubtask WHERE taskid='$taskid'";
        $getsubtask=mysqli_query($con,$getsubtaskquery);
        if(mysqli_num_rows($getsubtask)>0){
            $finishTaskCount=$finishTaskCount;
        }else{
            $finishTaskCount++;
        }
    }
}

if($taskcount>0 || $subTaskcount>0){
    $totalTask=$subTaskcount+$taskcount;
$totalFinish=$finishSubtaskCount+$finishTaskCount;


$projectStatus=round(($totalFinish/$totalTask)*100,1);

$updatePrograssQuery="UPDATE utproject SET projectPrograss='$projectStatus' WHERE id='$projectid'";
$updatePrograss=mysqli_query($con,$updatePrograssQuery);
}

?>

<div class="projectPrograssBar">
    <div class="projectProjectBarData" data-projectPrograss="<?php echo $projectStatus; ?>" style="width:<?php echo $projectStatus; ?>%;">
        <?php echo $projectStatus."%"; ?>
    </div>
</div>