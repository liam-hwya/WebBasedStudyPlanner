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
                date_default_timezone_set('Asia/Yangon');
                $today=date('d F, l');
                
                //for today
                
                $getToday="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$todayDformat'";
                $gettdTasks=mysqli_query($con,$getToday);
                $taskCount=mysqli_num_rows($gettdTasks);
                if($taskCount<2){
                    $taskCounttext=$taskCount."<span>task</span>";
                }else{
                    $taskCounttext=$taskCount."<span>tasks</span>";
                }
                echo "<div class='dashboardTaskHeader'>
                <div class='dashboardHeaderTexts'>
                    <div class='dashboardHeaderTitle'>Today</div>
                    <div class='dashboardHeadersubTitle'>".$today."</div>
                </div>
                <div class='dashboardHeaderGui'>".$taskCounttext."</div>
            </div>";
                if(mysqli_num_rows($gettdTasks)>0){
                    
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
                            $ehour=00;
                        }
        
                        if($shour==12){
                            $shour=00;
                        }
                        
        
                        $nowhour = ampm(date('a')).date('h').date('i');
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
                        echo "<div class='UTeachTaskContainer' data-taskid='".$taskid."' style='border-right-color:".$taskColor."'>
                            <div class='utTaskTitle'>
                                <span>".$UTtask."</span>
                                <div class='utTaskHours'>".$fromTime."</div>
                            </div>
                            <div class='utTaskTime'>
                                <div class='utTaskHours'>".$priorities[$priority]."</div>
                                <div class='utTaskStatusContainer'>".$taskChecker."</div>
                            </div>
                        </div>";
                    }
                }


           ?>
    </div>
    

    <div class="dashboardProjectContainer">
        <?php
            $getProjectQuery="SELECT * FROM utproject WHERE userid='$UTuserid' AND projectStatus='0'  ORDER BY id DESC";
            $getProject=mysqli_query($con,$getProjectQuery);
            $projectCout=mysqli_num_rows($getProject);
            $getLastProjectQuery="SELECT * FROM utproject WHERE userid='$UTuserid' AND projectStatus='0' ORDER BY id DESC LIMIT 1";
            $getLastProject=mysqli_query($con,$getLastProjectQuery);
            if(mysqli_num_rows($getLastProject)>0){
                while($lastproject=mysqli_fetch_assoc($getLastProject)){
                    $lastModified="last modified on ".date("d F", strtotime($lastproject['modifiedTime']));
                }
            }else{
                $lastModified="No Project";
            }
            if($projectCout<2){
                $projectCoutText=$projectCout."<span>project</span>";
            }else{
                $projectCoutText=$projectCout."<span>projects</span>";
            }
            echo "<div class='dashboardProjectHeader'>
                    <div class='dashboardHeaderTexts'>
                    <div class='dashboardHeaderTitle'>Projects</div>
                    <div class='dashboardHeadersubTitle'>".$lastModified."</div>
                </div>
                <div class='dashboardHeaderGui'>".$projectCoutText."</div>
            </div>";
            if(mysqli_num_rows($getProject)>0){
                while($project=mysqli_fetch_assoc($getProject)){
                    echo "<div data-projectid='".$project['id']."' class='dashboardEachProjectContainer'>
                                <div class='dbProjectName'>
                                    ".$project['projectName']."
                                </div>
                                <div class='dbProjectinfos'>
                                    <div class='dbProjectDesc'>".$project['projectDescription']."</div>
                                    <div class='dbProjectProg'>".$project['projectPrograss']."%</div>
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
            $examCount=mysqli_num_rows($getExam);
            if($examCount<2){
                $examCountText=$examCount."<span>exam</span>";
            }else{
                $examCountText=$examCount."<span>exams</span>";
            }
            echo "<div class='dashboardExamHeader'>
                        <div class='dashboardHeaderTexts'>
                            <div class='dashboardHeaderTitle'>Exam</div>
                            <div class='dashboardHeadersubTitle'>....</div>
                        </div>
                        <div class='dashboardHeaderGui'>".$examCountText."</div>
                </div>";
            if(mysqli_num_rows($getExam)>0){
                while($exams=mysqli_fetch_assoc($getExam)){
                    $examDate=date("Y F,d", strtotime($exams['examDate']));
                    echo "<div data-examid='".$exams['id']."' class='dashboardEachExamContainer'>
                                <div class='dbProjectName'>
                                    ".$exams['examName']."
                                </div>
                                <div class='dbProjectinfos'>
                                    <div class='dbProjectDesc'>".$examDate."</div>
                                    <div class='dbProjectProg'></div>
                                </div>
                          </div>";
                }
            }
        ?>
    </div>
</div>