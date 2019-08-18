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
    
    
    $getQuery="SELECT * FROM uttask WHERE userid='$UTuserid' AND taskStatus='0'";
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
            $taskSubject=$UTtask['tasksubject'];
            
            $unDformat=substr($UTtask['dformat'],1);
            // $ThisDateToShow=date("Y F,d", strtotime($taskDate));
            $priorities=array("Urgent","Important","Medium","Low");
            $priority=$UTtask['priority']-1;
            $i=1;
            
                
            if($unDformat==$todayDate){
                if($ehour==12){
                    $ehour=00;
                }

                if($shour==12){
                    $shour=00;
                }
                

                $nowhour = ampm(date('a')).date('h').date('i');
                $taskshour= ampm($sampm).twoDigit($shour).twoDigit($sminute);
                $taskehour= ampm($eampm).twoDigit($ehour).twoDigit($eminute);

               
                if($nowhour>$taskshour && $nowhour<$taskehour){
                    echo "<div class='NotiTaskContainer' style='border-left:solid 2px ".$taskColor."'>
                        <div class='notiTaskText'>".$taskSubject."</div>
                        <div class='notiTaskPriority'>".$priorities[$priority]."<span>Now</span></div>
                    </div>";

                    $hasNoti=true;
                }
            }
        }
    }else{
        echo "<div class='timeTableNoTaskText'>No Task For Today</div>";
    }
?>

<script>
    var hasNoti=<?php echo $hasNoti; ?>;
    if(hasNoti==1){
        $(".showHideNoti").addClass("hasNoti");
    }
</script>