<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');
$examid=$_POST['examid'];


echo "<table class='addResultTable'><th>Subject</th><th>Mark</th>";
$passcount=0;
$getSubQuery="SELECT * FROM utsubjects WHERE examid='$examid'";
$getSubjects=mysqli_query($con,$getSubQuery);
$subjectCount=mysqli_num_rows($getSubjects);
if(mysqli_num_rows($getSubjects)>0){
    while($subject=mysqli_fetch_assoc($getSubjects)){
        echo "<tr>
            <td>".$subject['utsubject']."</td>
            <td><input class='addMarkInput' placeholder='".$subject['getMark']."' data-subid='".$subject['id']."' type='text'></td>
        </tr>";
    }
    echo "</table>
    <div class='addResultFormFooter'>
        <div class='cancelExamResultBtn'>Cancel</div>
        <div data-examid='".$examid."' class='calcExamResultBtn'>Ok</div>
    </div>";
}else{
    echo "Empty Exam";
}
?>