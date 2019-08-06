<?php
    require_once("auth.php");
    require_once("today.php");
    require_once("db_con.php");
    require_once("getuserdatas.php");
    function twoDigit($num){
        if($num<10){
            $num="0".$num;
            return $num;
        }else{
            return $num;
        }
    };

    $UTuserEmail=$_SESSION['UTuser'];
    $UTuserid=userData($UTuserEmail,'id');
    $dformat=$_POST['dformat'];
    
    $getQuery="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$dformat'";
    $getTasks=mysqli_query($con,$getQuery);
    if(mysqli_num_rows($getTasks)>0){
        while($UTtask=mysqli_fetch_assoc($getTasks)){
            $shour= $UTtask['shour'];
            $sminute=$UTtask['sminute'];
            $sampm=$UTtask['sampm'];
            $ehour= $UTtask['ehour'];
            $eminute=$UTtask['eminute'];
            $eampm=$UTtask['eampm'];
            $taskDate= $UTtask['taskdate'];
            $taskColor=$UTtask['utColor'];
            $fromTime=twoDigit($shour).":".twoDigit($sminute)." ".$sampm;
            $toTime=twoDigit($ehour).":".twoDigit($eminute)." ".$eampm;
            $UTtask= $UTtask['tasksubject'];
            echo "<div class='UTeachTaskContainer' style='border-right-color:".$taskColor."'>
                <div class='utTaskTitle'>".$UTtask."</div>
                <div class='utTaskTime'>
                    <div class='utTaskHours'>".$fromTime." to ".$toTime."</div>
                    <div class='utTaskDate'>".$taskDate."</div>
                </div>
            </div>";
        }
    }else{
        echo "No Task Today";
    }
?>