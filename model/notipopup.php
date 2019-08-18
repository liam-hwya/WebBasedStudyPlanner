<?php
        require_once("auth.php");
        require_once("db_con.php");
        require_once("getuserdatas.php");
        date_default_timezone_set('Asia/Yangon');
        $todayDformat="d".date('Ymd');
        $UTuserEmail=$_SESSION['UTuser'];
        $UTuserid=userData($UTuserEmail,'id');

        function twoDigit($num){
            if($num<10){
                $num="0".$num;
                return $num;
            }elseif($num==12){
                $num="00";
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
    
    $nowhour = ampm(date('a')).date('h').date('i');

    $getQuery="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$todayDformat'";
    $getTasks=mysqli_query($con,$getQuery);
    $earlier=99999;
        $taskid=0;
    if(mysqli_num_rows($getTasks)>0){        
        while($UTtask=mysqli_fetch_assoc($getTasks)){
            $hour=twoDigit($UTtask['shour']);
            $minute=twoDigit($UTtask['sminute']);
            $sampm=ampm($UTtask['sampm']);
            $tasktime=$sampm.$hour.$minute;
            if($tasktime<$earlier && $tasktime>=$nowhour){
                $earlier=$tasktime;
                $taskid=$UTtask['id'];
            }
        }
        
    }

    $getTaskQuery="SELECT * FROM uttask WHERE id='$taskid'";
    $taskget=mysqli_query($con,$getTaskQuery);
    if(mysqli_num_rows($taskget)>0){
        while($task=mysqli_fetch_assoc($taskget)){
            echo "
                <div class='utimeNotificationBox' data-taskid='".$taskid."' data-notiTime='".$earlier."'>
                    <div class='popupnotiHeader'>You Have To Do!</div>
                    <div class='popupnotiTask'>".$task['tasksubject']."</div>
                    <div class='popupnotiControls'>
                        <div data-taskid='".$taskid."' class='accessPopupNoti'>Access</div>
                        <div data-taskid='".$taskid."' class='declinePopupNoti'>Decline</div>
                    </div>
                </div>
            ";
        }
    }

    
?>