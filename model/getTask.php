<?php
    require_once("auth.php");
    require_once("today.php");
    require_once("db_con.php");
    require_once("getuserdatas.php");
    date_default_timezone_set('Asia/Yangon');
    function twoDigit($num){
        if($num<10){
            $num="0".$num;
            return $num;
        }else{
            return $num;
        }
    };

    function ampm($ampm){
        if($ampm=="am"){
             return 1;
         }else{
             return 2;
         }
     }

    $todayDate=date('Ymd');
    
    $UTuserEmail=$_SESSION['UTuser'];
    $UTuserid=userData($UTuserEmail,'id');
    $dformat=$_POST['dformat'];
    $unDformat=substr($dformat,1);
    
    $ThisDateToShow=date("Y F,d", strtotime(substr($dformat,1,45)."-".substr($dformat,5,6)."-".substr($dformat,7,8)));

    echo "<div class='taskDayTitle'>".$ThisDateToShow."</div>";
    $getQuery="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$dformat'";
    $getTasks=mysqli_query($con,$getQuery);
    if(mysqli_num_rows($getTasks)>0){
        
        while($UTtask=mysqli_fetch_assoc($getTasks)){
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
            // $ThisDateToShow=date("Y F,d", strtotime($taskDate));
            $priorities=array("Urgent","Important","Medium","Low");
            $priority=$UTtask['priority']-1;
            $i=1;
                
            if($unDformat==$todayDate){
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
            }elseif($taskStatus==0 && $unDformat<$todayDate){
                $taskChecker="<span class='missedTasktext uttaskid".$taskid."'>Missed</span><img data-taskid='".$taskid."' class='uttaskchecker' src='assets/icons/beforeCheck.png'>";
            }elseif($taskStatus==1 && $unDformat<$todayDate){
                $taskChecker="<span class='successTasktext uttaskid".$taskid."'>Success</span><img data-taskid='".$taskid."' class='uttaskchecker checked' src='assets/icons/afterCheck.png'>";
            }else{
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
        echo "<div class='timeTableNoTaskText'>No Task For Today</div>";
    }
?>