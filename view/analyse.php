<?php
    require_once("../model/auth.php");
    require_once("../model/db_con.php");
    require_once("../model/getuserdatas.php");
    $_SESSION['pagename']="analyse";
    date_default_timezone_set('Asia/Yangon');
    
    $UTuserEmail=$_SESSION['UTuser'];
    $UTuserid=userData($UTuserEmail,'id');
?>


<div class="timeLineMainConntainer">
    <div class="timeLineWorksAnalyserContainer">
    
        <div class="timeLineWorksAnalyser">
            <?php 
                $i=0;
                while($i<7){
                    $previous_week = strtotime("-1 week +1 day");
                    $start_week = strtotime("last sunday midnight ".$i." day",$previous_week);
                    $dformat ="d".date("Ymd",$start_week);
                    
                    $getTasksQuery="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$dformat'";
                    $getTasks=mysqli_query($con,$getTasksQuery);
                    $taskCount=mysqli_num_rows($getTasks);
                    if($taskCount>0){
                        $getDoneTaskQuery="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$dformat' AND taskStatus='1'";
                        $getDoneTask=mysqli_query($con,$getDoneTaskQuery);
                        $DoneTaskCount=mysqli_num_rows($getDoneTask);
                        $prograss=round(($DoneTaskCount/$taskCount)*100,1);
                        if($prograss<21){
                            $color="rgb(216, 47, 47)";
                        }elseif($prograss<41 && $prograss>20){
                            $color="rgb(238, 123, 46)";
                        }elseif($prograss<71 && $prograss>40){
                            $color="rgb(188, 216, 30)";
                        }elseif($prograss>70){
                            $color="rgb(37, 194, 45)";
                        }
                        echo "<div class='timeLineWorkAnalyserBars'><div class='anasiserInText'>".$prograss."%</div><div class='analiserInGui' style='height:".$prograss."%;background:".$color."'></div></div>";
                    }else{
                        echo "<div class='timeLineWorkAnalyserBars'><div class='anasiserInText'></div></div>";
                    }
                    

                    

                    $i++;
                }
            ?>
        </div>
        <div class="timeLineWorksAnalyserDays">
            <div class="timeLineDays">SUN</div>
            <div class="timeLineDays">MON</div>
            <div class="timeLineDays">TUE</div>
            <div class="timeLineDays">WED</div>
            <div class="timeLineDays">THU</div>
            <div class="timeLineDays">FRI</div>
            <div class="timeLineDays">SAT</div>
        </div>
        <div class="AnalyserTitle">Last Week Task Analyse</div>
    </div>
    <div class="timeLineEmotionAnalyser">

    </div>
</div>