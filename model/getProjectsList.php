<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

echo "<span class='failexamListTypeTitle'>Closed Project</span>";
echo "<div class='examListContainer failExamList'> ";
$getQuery2="SELECT * FROM utproject WHERE userid='$UTuserid' AND projectStatus='2'";
$getProject2=mysqli_query($con,$getQuery2);
if(mysqli_num_rows($getProject2)>0){
    while($project2=mysqli_fetch_assoc($getProject2)){
        echo "<div data-projectid='".$project2['id']."' class='eachProjectContainer'>
                <img src='assets/icons/folder.png'>
                <span>".$project2['projectName']."</span>
              </div>";
    }
}
echo "</div>";


echo "<span class='passexamListTypeTitle'>Finished Projects</span>";
echo "<div class='examListContainer passExamList'> ";
$getQuery1="SELECT * FROM utproject WHERE userid='$UTuserid' AND projectStatus='1'";
$getProject1=mysqli_query($con,$getQuery1);
if(mysqli_num_rows($getProject1)>0){
    while($project1=mysqli_fetch_assoc($getProject1)){
        echo "<div data-projectid='".$project1['id']."' class='eachProjectContainer'>
                <img src='assets/icons/folder.png'>
                <span>".$project1['projectName']."</span>
              </div>";
    }
}
echo "</div>";

echo "<span class='comingexamListTypeTitle'>Working Projects</span>";
echo "<div class='examListContainer commingExamList'> ";
$getQuery0="SELECT * FROM utproject WHERE userid='$UTuserid' AND projectStatus='0'";
$getProject0=mysqli_query($con,$getQuery0);
if(mysqli_num_rows($getProject0)>0){
    while($project0=mysqli_fetch_assoc($getProject0)){
        echo "<div data-projectid='".$project0['id']."' class='eachProjectContainer'>
                <img src='assets/icons/folder.png'>
                <span>".$project0['projectName']."</span>
              </div>";
    }
}
echo "</div>";



?>