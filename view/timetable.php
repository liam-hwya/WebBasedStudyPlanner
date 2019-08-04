<?php
include("../model/auth.php");
include("../model/db_con.php");
include("../model/today.php");
$_SESSION['pagename']="timetable";
$utuser=$_SESSION['UTuser'];
if(isset($_POST['dayPgStatus'])){
    $dayPgStatus=$_POST['dayPgStatus'];
}
if(isset($_POST['monthPgStatus'])){
    $monthPgStatus=$_POST['monthPgStatus'];
}

$plannedDates=array();
$getQuery="SELECT * FROM uttask";
$UTevents=mysqli_query($con,$getQuery);
if(mysqli_num_rows($UTevents)>0){
    while($UTevent=mysqli_fetch_assoc($UTevents)){
        $UTeventDate= $UTevent['dformat'];
        array_Push($plannedDates,$UTeventDate);
    }
}else{
    return NULL;
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
            <div class="timeTableTypeSwitch">
                <img src="assets/icons/calendarView.png" class="switchToCalView">
                <img src="assets/icons/todayTasks.png" class="switchToDayView" style="display:none">
            </div>
            <div class="todayDateAtCalenda clanderYMshower" style="display:<?php echo $monthPgStatus; ?>"><?php echo $html_title; ?></div>
            <div id="<?php echo $dfToday; ?>" class="todayDateAtCalenda todayYMshower" style="display:<?php echo $dayPgStatus; ?>"> <?php echo $todayDate; ?></div>
            <div class="theSpaceBetweenDateNControl"></div>
            <div style="display:<?php echo $monthPgStatus; ?>" class="changeCalendarMonth goBackTodayBtn" data-id=""><?php echo $toDayNum; ?></div>
            <div style="display:<?php echo $monthPgStatus; ?>" class="changeCalendarMonth" data-id="?ym=<?php echo $prev; ?>"><img src="assets/icons/left.png" alt=""></div>
            <div style="display:<?php echo $monthPgStatus; ?>" class="changeCalendarMonth" data-id="?ym=<?php echo $next; ?>"><img src="assets/icons/right.png" alt=""></div>
            <div class="todayDayShower" style="display:<?php echo $dayPgStatus; ?>"><?php echo $toDayNum; ?></div>
            <div class="addNewTaskBtn"><img src="assets/icons/calendarView.png"></div>
        </div>


    <!-- Each Day View Start -->
        <div class="eachDayTimeTableContainer" style="display:<?php echo $dayPgStatus; ?>">
            
            <div class="EachDaytimeLineContainer">
            <?php
                    $i=1;
                    while($i<13){
                        if($i%2 == 0){
                            echo "<div class='EachDayHours soneTime'>".$i.":00 AM</div>";
                        }else{
                            echo "<div class='EachDayHours'>".$i.":00 AM</div>";
                        }
                        $i++;
                    }

                    $r=1;
                    while($r<13){
                        if($r%2 == 0){
                            echo "<div class='EachDayHours soneTime'>".$r.":00 PM</div>";
                        }else{
                            echo "<div class='EachDayHours'>".$r.":00 PM</div>";
                        }
                        $r++;
                    }
                ?>
            </div>
            <div class="eachDayTimeTableToDosContainer">
                <?php include("../model/getTask.php"); ?>
            </div>
        </div>
    <!-- Each Day View end -->

    <!-- Calendar view Start -->
        <table class="timeTableBody" style="display:<?php echo $monthPgStatus; ?>">
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
                <div class="newTaskSaveBtn">Save</div> 
                <div class="newTaskCancelBtn">Cancel</div> 
                
            </form>
            
    </div>
</div>