<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');



if(isset($_POST['projectid'])){
    $projectid=$_POST['projectid'];
    $getProjectQuery="SELECT * FROM utproject WHERE id='$projectid' AND userid='$UTuserid'";
}else{
    $getProjectQuery="SELECT * FROM utproject WHERE projectStatus='0' AND userid='$UTuserid' ORDER BY id DESC LIMIT 1";
}

$getProject=mysqli_query($con,$getProjectQuery);
if(mysqli_num_rows($getProject)>0){
    While($project=mysqli_fetch_assoc($getProject)){
        $projectid=$project['id'];
        $projectStatus=$project['projectStatus'];
        echo "<div class='projectDetailHeader'>
            <img src='assets/icons/back.png' class='hideProjectDetailinMobile'><div class='projectTitle'>".$project['projectName']."</div><div class='projectInfoBtn'>i</div>
        </div>
        <div class='projectPrograssBarContainer'>
            <script>
                $('.projectPrograssBarContainer').load('model/projectPrograss.php',{projectid:".$projectid."});
            </script>
        </div>";

        $getptaskQuery="SELECT * FROM utptask WHERE projectid='$projectid'";
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
                $ptaskStatus=$ptask['ptaskStatus'];

                if($subTaskCount==0){
                    $checkable=" checkable";
                    if($ptaskStatus==0){
                        $taskCheckImg="assets/icons/beforeCheck.png";
                        $taskStatus="";
                    }else{
                        $taskCheckImg="assets/icons/afterCheck.png";
                        $taskStatus=" checked";
                    }
                }else{
                    $checkable="";
                    if($doneSubTaskCount<$subTaskCount){
                        $taskCheckImg="assets/icons/beforeCheck.png";
                        $taskStatus="";
                    }else{
                        $taskCheckImg="assets/icons/afterCheck.png";
                        $taskStatus=" checked";
                    }
                }

                
                echo "<div class='projectEachTaskContainer'>
                    <div class='projectTask id".$ptaskid."'>
                        <img src='".$taskCheckImg."' data-projectid='".$projectid."' data-taskid='".$ptaskid."' class='projectTaskControl".$checkable.$taskStatus."'>
                        <div data-taskid='".$ptaskid."' class='projectTaskText showDeleteTaskBox'>".$ptaskText."</div>
                    </div>
                    <div class='projectSubTask'>";
                    $getSubTaskQuery="SELECT * FROM utpsubtask WHERE taskid='$ptaskid'";
                    $getSubTask=mysqli_query($con,$getSubTaskQuery);
                    if(mysqli_num_rows($getSubTask)>0){
                        while($subTask=mysqli_fetch_assoc($getSubTask)){
                            $subtaskid=$subTask['id'];
                            $subtaskText=$subTask['subtask'];
                            $subtaskStatus=$subTask['subtaskStatus'];   
                            if($subtaskStatus==0){
                                $subtaskCheckImg="assets/icons/beforeCheck.png";
                                $status="";
                            }else{
                                $subtaskCheckImg="assets/icons/afterCheck.png";
                                $status=" checked";
                            }
                            echo "<div class='subTask'>
                                    <img src='".$subtaskCheckImg."' data-taskid='".$ptaskid."' data-subTaskid='".$subtaskid."' data-projectid='".$projectid."' class='subTaskControl".$status."'>
                                    <div data-subtaskid='".$subtaskid."' class='subTaskText showDeleteTaskBox'>".$subtaskText."</div>
                                </div>";
                        }
                    }
                    if($projectStatus==0){
                        echo"<div class='addNewSubTaskContainer'>
                        <img data-taskid='".$ptaskid."' src='assets/icons/addtask.png' class='showAddSubTaskInput'>
                        <div class='addNewSubTaskInput addSubTaskbox".$ptaskid."'>
                            <input type='text' class='addNewSubTaskText addNewSubTaskBox".$ptaskid."'>
                            <img data-projectid='".$projectid."' data-subtaskid='".$ptaskid."' src='assets/icons/addNewTask.png' class='addNewSubTaskBtn'>
                        </div>
                    </div>";
                    }
                    echo"</div>
                </div>";
    }
}

    }


    if($projectStatus==0){
        echo "
        <div class='projectControlContainer'>
            <div data-projectid='".$projectid."' class='finishProjectBtn'>Finish Project</div>
            <div data-projectid='".$projectid."' class='closeProjectBtn'>Close Project</div>
            <div data-projectid='".$projectid."' class='delProjectBtn'>Delete Project</div>
        </div>
        ";

        echo "<div class='addNewTaskContainer'>
            <input type='text' class='addNewTaskInput addTaskTextFor".$projectid."' placeholder='Add New State'>
            <img data-projectid='".$projectid."' src='assets/icons/addNewTask.png' class='addNewTaskBtn'>
        </div>";
    }elseif($projectStatus==1){
        echo "
        <div class='projectControlContainer'>
            <div data-projectid='".$projectid."' class='upDateProject'>Update Project</div>
        </div>
        ";
    }elseif($projectStatus==2){
        echo "
        <div class='projectControlContainer'>
            <div data-projectid='".$projectid."' class='upDateProject'>Restore Project</div>
        </div>
        ";
    }
    
}else{
    echo "<div class='noWorkingProjectYet'>No Working Project Yet!</div>";
}


?>

<div data-projectid="<?php echo $projectid; ?>" class='delTaskBtnBox'>
    <img src="assets/icons/delptask.png">
</div>

<div class="projectCompleteAlert">
    <div class="projectCompleteAlertHeader">All Tasks Are Completed?</div>
    <div class="projectCompleteAlertMessage">Do you want to finish the project?</div>
    <div class="projectCompleteControls">
        <div data-projectid="<?php echo $projectid; ?>" class="completeProjectYesBtn">Yes</div>
        <div class="completeProjectNoBtn">No</div>
    </div>
</div>



