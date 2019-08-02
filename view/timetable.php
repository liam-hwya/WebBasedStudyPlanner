<?php
include("../model/auth.php");
session_start();
$_SESSION['pagename']="timetable";
// Set your timezone
date_default_timezone_set('Asia/Tokyo');

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
$plannedDates=array("d2019082","d2019089","d2019085","d2019095");

$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;
     
    if ($today == $date) {
        $plannerClass="d".$dataY.$dataM.$day;
        $week .= '<td class="today '.$plannerClass.'">' . $day;
    } else {
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

<div class="planContOnMouse">5 things to Do</div>
<div class="timeTable_main_container">
    <!-- Timetable Calendar View -->
    <div class="timetable_calander_container">

        <div class="calendar_header">
            <div class="todayDateAtCalenda"><?php echo $html_title; ?></div>
            <div class="theSpaceBetweenDateNControl"></div>
            <div class="changeCalendarMonth" data-id="?ym=<?php echo $prev; ?>"><img src="assets/icons/left.png" alt=""></div>
            <div class="changeCalendarMonth" data-id="?ym=<?php echo $next; ?>"><img src="assets/icons/right.png" alt=""></div>
        </div>

        

        
         

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
        
        


    </div>
    <div class="timetable_plans_conntainer">
            <?php
                foreach($plannedDates as $dayWithPlan){
                    echo $dayWithPlan."<br>";
                }
            ?>
    </div>

</div>