<?php

require_once("auth.php");
require_once("db_con.php");
$examid=$_POST['examid'];

$passCount=0;
$getSubsQuery="SELECT * FROM utsubjects WHERE examid='$examid'";
$getSubs=mysqli_query($con,$getSubsQuery);
$subjectCount=mysqli_num_rows($getSubs);

if($subjectCount>0){
    while($subject=mysqli_fetch_assoc($getSubs)){
        $getMark=$subject['getMark'];
        $minMark=$subject['minMark'];
        if($getMark>=$minMark){
            $passCount++;
        }else{

        }
    }
}

if($passCount==$subjectCount){
    $updateExamQuery="UPDATE utexam SET examStatus='1' WHERE id='$examid'";
    $updateExam=mysqli_query($con,$updateExamQuery);
    if($updateExam){
        echo "pass";
    }
}else{
    $updateExamQuery="UPDATE utexam SET examStatus='2' WHERE id='$examid'";
    $updateExam=mysqli_query($con,$updateExamQuery);
    echo "fail";
}

?>