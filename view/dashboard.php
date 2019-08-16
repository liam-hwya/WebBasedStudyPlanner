<?php
    require_once("../model/auth.php");
    require_once("../model/db_con.php");
    require_once("../model/today.php");
    require_once("../model/getuserdatas.php");
    $_SESSION['pagename']="dashboard";
    $UTuserEmail=$_SESSION['UTuser'];
    $UTuserid=userData($UTuserEmail,'id');

?>

<div class="dashboardMainContainer">
    <div class="dashboardTaskContainer">
    <?php    
            function twoDigit($num){
                if($num<10){
                    $num="0".$num;
                    return $num;
                }else{
                    return $num;
                }
            }

            function ampm($ampm){
                    if($ampm=="am"){
                        return 1;
                    }else{
                        return 2;
                    }
                }
                
                //for today
                
                $getToday="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$todayDformat'";
                $gettdTasks=mysqli_query($con,$getToday);
                if(mysqli_num_rows($gettdTasks)>0){
                    echo "<div class='dashboardTaskHeader'></div>";
                    while($UTtask=mysqli_fetch_assoc($gettdTasks)){
                        $taskid=$UTtask['id'];
                        $shour= $UTtask['shour'];
                        $sminute=$UTtask['sminute'];
                        $sampm=$UTtask['sampm'];
                        $ehour= $UTtask['ehour'];
                        $eminute=$UTtask['eminute'];
                        $eampm=$UTtask['eampm'];
                        $taskDate= $UTtask['taskdate'];
                        $taskColor=$UTtask['utColor'];
                        $taskStatus=$UTtask['taskStatus'];
                        $ThisDateToShow=date("Y F,d", strtotime($taskDate));
                        $priorities=array("Urgent","Important","Medium","Low");
                        $priority=$UTtask['priority']-1;

                        if($ehour==12){
                            $ehour=0;
                        }
        
                        if($shour==12){
                            $shour=0;
                        }
        
                        $nowhour = ampm(date('a')).date('H').date('i');
                        $taskshour= ampm($sampm).twoDigit($shour).twoDigit($sminute);
                        $taskehour= ampm($eampm).twoDigit($ehour).twoDigit($eminute);
                            
                            
                            if($nowhour>$taskehour){
                                if($taskStatus==0){
                                    $taskChecker="<span class='missedTasktext uttaskid".$taskid."'>Missed</span><img data-taskid='".$taskid."' class='uttaskchecker' src='assets/icons/beforeCheck.png'>";
                                }else{
                                    $taskChecker="<span class='successTasktext uttaskid".$taskid."'>Success</span><img data-taskid='".$taskid."' class='uttaskchecker checked' src='assets/icons/afterCheck.png'>";
                                }
                            }elseif($nowhour>$taskshour && $nowhour<$taskehour){
                                $taskChecker="<span class='successTasktext uttaskid".$taskid."'>Now</span>";
                            }elseif($nowhour<$taskshour){
                                $taskChecker="<span class='successTasktext uttaskid".$taskid."'>Coming</span>";
                            }
    
                        $fromTime=twoDigit($shour).":".twoDigit($sminute)." ".$sampm;
                        $toTime=twoDigit($ehour).":".twoDigit($eminute)." ".$eampm;
                        $UTtask= $UTtask['tasksubject'];
                        echo "<div class='UTeachTaskContainer' style='border-right-color:".$taskColor."'>
                            <div class='utTaskTitle'>
                                <span>".$UTtask."</span>
                                <div class='utTaskHours'>".$fromTime." - ".$toTime."</div>
                            </div>
                            <div class='utTaskTime'>
                                <div class='utTaskHours'>".$priorities[$priority]."</div>
                                <div class='utTaskStatusContainer'>".$taskChecker."</div>
                            </div>
                        </div>";
                    }
                }else{
                    echo "No Task For Today";
                }


           ?>
    </div>
    

    <div class="dashboardProjectContainer">
        <?php
            $getProjectQuery="SELECT * FROM utproject WHERE userid='$UTuserid' AND projectStatus='0'";
            $getProject=mysqli_query($con,$getProjectQuery);
            echo "<div class='dashboardProjectHeader'></div>";
            if(mysqli_num_rows($getProject)>0){
                while($project=mysqli_fetch_assoc($getProject)){
                    echo "<div data-projectid='".$project['id']."' class='dashboardEachProjectContainer'>
                                <div class='dbProjectName'>
                                    ".$project['projectName']."
                                </div>
                                <div class='dbProjectinfos'>
                                    <div class='dbProjectDesc'></div>
                                    <div class='dbProjectProg'></div>
                                </div>
                          </div>";
                }
            }
        ?>
    </div>
    
    <div class="dashboardExamContainer">
        <?php
            $getExamQuery="SELECT * FROM utexam WHERE userid='$UTuserid' AND examstatus='0'";
            $getExam=mysqli_query($con,$getExamQuery);
            echo "<div class='dashboardExamHeader'></div>";
            if(mysqli_num_rows($getExam)>0){
                echo "<span class='comingexamListTypeTitle'>Coming Exam</span>";
                echo "<div class='examListContainer commingExamList'> ";
                while($exams=mysqli_fetch_assoc($getExam)){
                    echo "<div data-examid='".$exams['id']."' class='eachExamContainer'>
                        <img src='assets/icons/folder.png'>
                        <span>".$exams['examDate']."</span>
                    </div>";
                }
                echo "</div>";
            }
        ?>
    </div>
</div>