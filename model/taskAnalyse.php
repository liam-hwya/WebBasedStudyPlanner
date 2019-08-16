<?php

require_once("auth.php");
require_once("db_con.php");
require_once("getuserdatas.php");
$UTuserEmail=$_SESSION['UTuser'];
$userid=userData($UTuserEmail,'id');
// Set your timezone
date_default_timezone_set('Asia/Yangon');

$todayDate=date('Ymd');

function ampm($ampm){
    if($ampm=="am"){
        return 1;
    }else{
        return 2;
    }
}


function twoDigit($num){
    if($num<10){
        $num="0".$num;
        return $num;
    }else{
        return $num;
    }
}

$missTask=0;
$getTaskQuery="SELECT * FROM uttask WHERE userid='$userid' AND taskStatus='0'";
$getTask=mysqli_query($con,$getTaskQuery);
if(mysqli_num_rows($getTask)>0){
    while($task=mysqli_fetch_assoc($getTask)){
        $date=substr($task['dformat'],1);
        $ehour=$task['ehour'];
        $eminute=$task['eminute'];
        $eampm=$task['eampm'];

        if($ehour==12){
            $ehour=0;
        }
        $taskehour= ampm($eampm).twoDigit($ehour).twoDigit($eminute);
        $nowTime = ampm(date('a')).date('H').date('i');
        if($date==$todayDate){
            if($taskehour<$nowTime){
                $missTask++;   
            }
        }elseif($date<$todayDate){
            $missTask++;
        }
    }
}



$successTask=0;
$getTaskQuery="SELECT * FROM uttask WHERE userid='$userid' AND taskStatus='1'";
$getTask=mysqli_query($con,$getTaskQuery);
if(mysqli_num_rows($getTask)>0){
    while($task=mysqli_fetch_assoc($getTask)){
        $date=substr($task['dformat'],1);
        $ehour=$task['ehour'];
        $eminute=$task['eminute'];
        $eampm=$task['eampm'];
        if($ehour==12){
            $ehour=0;
        }
        $taskehour= ampm($eampm).twoDigit($ehour).twoDigit($eminute);
        $nowTime = ampm(date('a')).date('H').date('i');
        if($date==$todayDate){
            if($taskehour<$nowTime){
                $successTask++;   
            }
        }elseif($date<$todayDate){
            $successTask++;
        }
    }
}

if($missTask>1){
    $missTasksText=$missTask."<span>Tasks<span>";
}else{
    $missTasksText=$missTask."<span>Task<span>";
}

if($successTask>1){
    $successTaskText=$successTask."<span>Tasks<span>";
}else{
    $successTaskText=$successTask."<span>Task<span>";
}

?>

<div class="succssTaskAnaliseContainer">
    <div class="successTaskAnalyseText">Success</div>
    <div class="sucessTaskAnalyseGUI"><?php echo $successTaskText; ?></div>
</div>

<div class="missTaskAnaliseContainer">
    <div class="missTaskAnalyseText">Missed</div>
    <div class="missTaskAnalyseGUI"><?php echo $missTasksText; ?></div>
</div>