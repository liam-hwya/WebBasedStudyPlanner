<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

echo "<span class='failexamListTypeTitle'>Fail Exam</span>";
echo "<div class='examListContainer failExamList'> ";
$getQuery2="SELECT * FROM utexam WHERE userid='$UTuserid' AND examstatus='2'";
$getExam2=mysqli_query($con,$getQuery2);
if(mysqli_num_rows($getExam2)>0){
    while($exams2=mysqli_fetch_assoc($getExam2)){
        echo "<div data-examid='".$exams2['id']."' class='eachExamContainer'>
            <img src='assets/icons/folder.png'>
            <span>".$exams2['examDate']."</span>
        </div>";
    }
}
echo "</div>";


echo "<span class='passexamListTypeTitle'>Pass Exam</span>";
echo "<div class='examListContainer passExamList'> ";
$getQuery1="SELECT * FROM utexam WHERE userid='$UTuserid' AND examstatus='1'";
$getExam1=mysqli_query($con,$getQuery1);
if(mysqli_num_rows($getExam1)>0){
    while($exams1=mysqli_fetch_assoc($getExam1)){
        echo "<div data-examid='".$exams1['id']."' class='eachExamContainer'>
            <img src='assets/icons/folder.png'>
            <span>".$exams1['examDate']."</span>
        </div>";
    }
}
echo "</div>";

echo "<span class='comingexamListTypeTitle'>Coming Exam</span>";
echo "<div class='examListContainer commingExamList'> ";
$getQuery0="SELECT * FROM utexam WHERE userid='$UTuserid' AND examstatus='0'";
$getExam0=mysqli_query($con,$getQuery0);
if(mysqli_num_rows($getExam0)>0){
    while($exams0=mysqli_fetch_assoc($getExam0)){
        echo "<div data-examid='".$exams0['id']."' class='eachExamContainer'>
            <img src='assets/icons/folder.png'>
            <span>".$exams0['examDate']."</span>
        </div>";
    }
}
echo "</div>";



?>