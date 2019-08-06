<?php
require_once("../model/auth.php");
require_once("../model/db_con.php");
require_once("../model/today.php");
require_once("../model/getuserdatas.php");
$_SESSION['pagename']="timetable";
$UTuserEmail=$_SESSION['UTuser'];
$UTuserid=userData($UTuserEmail,'id');

function twoDigit($num){
    if($num<10){
        $num="0".$num;
        return $num;
    }else{
        return $num;
    }
};


$plannedDates=array();
$getQuery="SELECT * FROM uttask WHERE userid='$UTuserid'";
$UTevents=mysqli_query($con,$getQuery);
if(mysqli_num_rows($UTevents)>0){
    while($UTevent=mysqli_fetch_assoc($UTevents)){
        $UTeventDate= $UTevent['dformat'];
        array_Push($plannedDates,$UTeventDate);
    }
}

// Set your timezone
date_default_timezone_set('Asia/Yangon');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('F, Y', $timestamp);
$toDayNum=date('d');

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
$dataM=date('m', $timestamp);
$dataY=date('Y', $timestamp);
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;
     
    if ($today == $date) {
        if($day<10){
            $day="0".$day;
        }else{
            $day=$day;
        }
        $plannerClass="d".$dataY.$dataM.$day;
        $week .= '<td class="today '.$plannerClass.'">' . $day;
    } else {
        if($day<10){
            $day="0".$day;
        }else{
            $day=$day;
        }
        $plannerClass="d".$dataY.$dataM.$day;
        $week .= '<td class="'.$plannerClass.'" >' . $day;
    }
    $week .= '</td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }

}
?>
<script type="text/javascript">
    $(document).ready(function(){
        var plannedDates = <?php echo json_encode($plannedDates); ?>;
        for(let i = 0; i < plannedDates.length; i++){
            var plannedDay=$("."+plannedDates[i]);
            // plannedDay.css("background","green");
            plannedDay.addClass("planTaken");
            // plannedDay.on("click",function(){
            //     alert($(this).attr("class"));
            // });
        }
    });
    
</script>

<div class="planContOnMouse"></div>
<div class="timeTable_main_container">

    <div data-page="month" class="timetable_calander_container">
        <div class="calendar_header">
            <div class="todayDateAtCalenda clanderYMshower"><?php echo $html_title; ?></div>
            <div class="theSpaceBetweenDateNControl"></div>
            <div class="changeCalendarMonth goBackTodayBtn" data-id=""><?php echo $toDayNum; ?></div>
            <div class="changeCalendarMonth" data-id="?ym=<?php echo $prev; ?>"><img src="assets/icons/left.png" alt=""></div>
            <div class="changeCalendarMonth" data-id="?ym=<?php echo $next; ?>"><img src="assets/icons/right.png" alt=""></div>
            <div class="addNewTaskBtn"><img src="assets/icons/add.png"></div>
        </div>

    <!-- Calendar view Start -->
        <table class="timeTableBody">
            <tr>
                <th>SUN</th>
                <th>MON</th>
                <th>THU</th>
                <th>Wed</th>
                <th>THU</th>
                <th>FRI</th>
                <th>SAT</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
        </table>
     <!-- Calendar view End -->       
    
    </div>



        
<!--Tasks Start-->
    <div class="timetable_plans_conntainer">
                <!-- <div class="taskTimeLineBtnHolder">
                    <div class="timeLineBtn" >
                        <div class="menu_icon"><img src="assets/icons/timeline.png"></div>
                        <div class="menu_text">Time Line</div>
                    </div>
                </div> -->

           <?php    
                
                //for today
                echo "<div class='taskDayTitle'>Today</div>";
                $getToday="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$todayDformat'";
                $gettdTasks=mysqli_query($con,$getToday);
                if(mysqli_num_rows($gettdTasks)>0){
                    while($UTtask=mysqli_fetch_assoc($gettdTasks)){
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
                    echo "No Task For Today";
                }


                //for tomorrow
                echo "<div class='taskDayTitle'>Tomorrow</div>";
                $getNextQuery="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat='$nextdformat'";
                $getNextTasks=mysqli_query($con,$getNextQuery);
                if(mysqli_num_rows($getNextTasks)>0){
                    while($UTtask=mysqli_fetch_assoc($getNextTasks)){
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
                    echo "No Task For Tomorrow";
                }
                
                //for other days
                echo "<div class='taskDayTitle'>Latter</div>";
                $getQuery="SELECT * FROM uttask WHERE userid='$UTuserid' AND dformat != '$nextdformat' AND dformat!='$todayDformat'";
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
                    echo "No More Task";
                }
           ?>
    </div>
<!--Tasks Start-->


</div>



























<div class="newTaskCreatorContainer">
    <div class="newTaskCreator">
                
            <form method="post" class="TaskCreatorForm">
                <div class="TaskCreatorHeader">
                    <span>Add New Task</span>
                    <div class="showColorPickerBtn"></div>
                </div>
                <!-- color picker -->
                <div class="colorPickerBox">
                     
                     <?php
                            $colorQuery="SELECT * FROM utcolors";
                            $colors=mysqli_query($con,$colorQuery);
                            while($color=mysqli_fetch_assoc($colors)){
                                $mycolor= $color['utcolor'];
                                echo "<div data-color='".$mycolor."' class='colorToPick' style='background:".$mycolor."'></div>";
                            }
                        ?>
                </div>
                <!-- subject input -->
                <input type="text" class="utColorHolder" style="display:none;">
                <input type="text" class="newTasksubject" placeholder="Subject">

                <!-- priority input -->
                <input type="range" class="newTaskPriority" min="1" max="4">

                <!-- date picker -->
                <input type="date" class="TCDatePicker" value="<?php echo date('Y-m-d');?>">


                <!-- start time start -->
                <div class="CtTimesPicker">
                    <select class="startHourPicker">
                        <?php
                            $h=1;
                            while($h<13){
                                echo "<option value='".$h."'>".$h."</option>";
                                $h++;
                            }
                        ?>
                    </select>
                    <select class="startMinutePicker">
                        
                        <?php
                            $m=5;
                            while($m<60){
                            echo "<option value='".$m."'>".$m."</option>"; 
                            $m+=5;
                            }
                        ?>
                    </select>
                    <select class="startAmPmPicker">
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                    </select>
                </div>
                <!-- start time end -->

                <!-- start time start -->
                <div class="CtTimesPicker">
                    <select class="endHourPicker">
                        <?php
                            $h=1;
                            while($h<13){
                                echo "<option value='".$h."'>".$h."</option>";
                                $h++;
                            }
                        ?>
                    </select>
                    <select class="endMinutePicker">
                        <?php
                            $m=5;
                            while($m<60){
                            echo "<option value='".$m."'>".$m."</option>"; 
                            $m+=5;
                            }
                        ?>
                    </select>
                    <select class="endAmPmPicker">
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                    </select>
                </div>
                <!-- start time end -->

                <!-- emotion to do this -->
                <input type="range" class="newTaskEmotion" min="1" max="5">
                
                <!-- save task btn -->
                <div data-uid="<?php echo $UTuserid; ?>" class="newTaskSaveBtn">Save</div> 
                <div class="newTaskCancelBtn">Cancel</div> 
                
            </form>
            
    </div>
</div>