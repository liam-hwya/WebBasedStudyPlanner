<?php
    require_once("../model/auth.php");
    $_SESSION['pagename']="exam";
    function twoDigit($num){
        if($num<10){
            $num="0".$num;
            return $num;
        }else{
            return $num;
        }
    };
?>
<div class="utexamMainContainer">
    <div class="utExamDetailContainer">
    
    </div>
    
    <div class="utExamListContainer">
<script>
    $(".utExamListContainer").load("model/getExamList.php");
    $(".utExamDetailContainer").load("model/getExamDetail.php");
</script>
    </div>

    <div class="addNewExam">
            <span>Add Exam</span>
            <div class="addNewExamIcon"><img src="assets/icons/add.png" alt=""></div>
    </div>
    <div class='addNewExamForm'>
        <input type="text" placeholder="Exam Name" class='addNewExamName'>
        <input type="date" class='addNewExamDate'>
        <div class="createExamBtn">Add</div>
    </div>


    <!-- Form for add new subject  -->
    <div class="addNewSubjectFormContanier">
        <div class="addNewSubjectForm">
            <div class="addNewSubjectFormHeader">
                <span>Add Subject For Exam</span>
                <img class='closeAddNewSubjectForm' src="assets/icons/cancel.png">
            </div>

            <label for="addNewSubjectName">Subject</label><input name="addNewSubjectName" type='text' class='addNewSubjectName'>
            <label for="addNewSubjectDate">Date</label><input name="addNewSubjectDate" type='date' class='addNewSubjectDate'>
            
            
            <label for="addNewSubFromTimeContainer">From Time</label>
            <div name="addNewSubFromTimeContainer" class="addNewSubFromTimeContainer">
                <select class='addNewSubftimeHour'>
                    <?php
                        $h=1;
                        while($h<13){
                            echo "<option value='".twoDigit($h)."'>".twoDigit($h)."</option>";
                            $h++;
                        }
                    ?>
                </select>
                <select class='addNewSubftimeMinute'>
                        <?php
                            $m=0;
                            while($m<60){
                            echo "<option value='".twoDigit($m)."'>".twoDigit($m)."</option>"; 
                            $m+=5;
                            }
                        ?>  
                </select>
                <select class='addNewSubftimeampm'>
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
            </div>

            <label for="addNewSubToTimeContainer">To Time</label>
            <div name="addNewSubToTimeContainer" class="addNewSubToTimeContainer">
                <select class='addNewSubttimeHour'>
                    <?php
                        $h=1;
                        while($h<13){
                            echo "<option value='".twoDigit($h)."'>".twoDigit($h)."</option>";
                            $h++;
                        }
                    ?>
                </select>
                <select class='addNewSubttimeMinute'>
                        <?php
                            $m=0;
                            while($m<60){
                            echo "<option value='".twoDigit($m)."'>".twoDigit($m)."</option>"; 
                            $m+=5;
                            }
                        ?>  
                </select>
                <select class='addNewSubttimeampm'>
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
            </div>


            <label for="addNewSubjectRoomNo">Room No</label><input name="addNewSubjectRoomNo" type='text' class='addNewSubjectRoomNo'>
            <label for="addNewSubjectChairNo">Chair No</label><input name="addNewSubjectChairNo" type='text' class='addNewSubjectChairNo'>
            <label for="addNewSubjectMinMark">Pass Mark</label><input name="addNewSubjectMinMark" type='text' class='addNewSubjectMinMark'>
            <div class="addNewSubjectSubmitBtn">Add</div>
        </div>
    </div>
</div>