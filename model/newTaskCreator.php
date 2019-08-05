<?php

    require_once("auth.php");
    require_once("db_con.php");

        $uid=$_POST['uid'];
        $subject=$_POST['taskSubject'];
        $date=$_POST['taskDate'];
        $sHour=$_POST['shour'];
        $sMinute=$_POST['sminute'];
        $sAmPm=$_POST['sampm'];
        $eHour=$_POST['ehour'];
        $eMinute=$_POST['eminute'];
        $eAmPm=$_POST['eampm'];
        $priority=$_POST['taskPriority'];
        $emotion=$_POST['taskEmotion'];
        $dFormet=$_POST['dformat'];
        $utColor=$_POST['utColor'];

        

        $addQuery="INSERT INTO uttask (userid,tasksubject,taskdate,shour,sminute,sampm,ehour,eminute,eampm,priority,emotion,dformat,utColor)
        VALUES('$uid','$subject','$date','$sHour','$sMinute','$sAmPm','$eHour','$eMinute','$eAmPm','$priority','$emotion','$dFormet','$utColor')";
        $taskAdd=mysqli_query($con,$addQuery);
        if($taskAdd){
            //dosomething
        }else{
            //dosomething
        }

?>