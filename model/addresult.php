<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');
$examid=$_POST['examid'];


echo "<table><th>Subject</th><th>Mark</th>";
$passcount=0;
$getSubQuery="SELECT * FROM utsubjects WHERE examid='$examid'";
$getSubjects=mysqli_query($con,$getSubQuery);
$subjectCount=mysqli_num_rows($getSubjects);
if(mysqli_num_rows($getSubjects)>0){
    while($subject=mysqli_fetch_assoc($getSubjects)){
        echo "<tr>
            <td>".$subject['utsubject']."</td>
            <td><input class='id".$subject['id']."' type='text'></td>
            <td><div data-subid='".$subject['id']."' class='addSubMarkBtn'>add</div></td> 
        </tr>";
    }
    echo "</table><div class='calcExamResultBtn'>Ok</div>";
}else{
    echo "Empty Exam";
}
?>