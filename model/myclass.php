<?php

require_once("auth.php");
require_once("db_con.php");
require_once("getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

if(isset($_POST['target'])){
    $target=$_POST['target'];

    if($target=="myteachers"){
        $getTeachersQuery="SELECT * FROM utteachers WHERE userid='$UTuserid'";
        $getTeachers=mysqli_query($con,$getTeachersQuery);
        if(mysqli_num_rows($getTeachers)>0){
            while($teacher=mysqli_fetch_assoc($getTeachers)){
                echo "<div class='classCardContainer'>
                    <div class='classCardinnerContainer'>
                        <div class='classCardDetail'>
                            <div class='classCardInfo'>
                                <img class='invertColor' src='assets/icons/exam.png'><span>".$teacher['teacherName']."</span>
                            </div>
                            <div class='classCardInfo'>
                                <img class='invertColor' src='assets/icons/subject.png'><span>".$teacher['teacherSubject']."</span>
                            </div>
                            <div class='classCardInfo'>
                                <img class='invertColor' src='assets/icons/phone.png'><span>".$teacher['teacherPhone']."</span>
                            </div>
                        </div>
                        <div class='classCardFace'>".$teacher['teacherName']."</div>
                    </div>
                </div>";
            }
        }
    }elseif($target=="mysubjects"){
        $geSubjectQuery="SELECT * FROM utclasssubjects WHERE userid='$UTuserid'";
        $getSubject=mysqli_query($con,$geSubjectQuery);
        if(mysqli_num_rows($getSubject)>0){
            while($subject=mysqli_fetch_assoc($getSubject)){
                echo "<div class='classCardContainer'>
                    <div class='classCardinnerContainer'>
                        <div class='classCardDetail'>
                            <div class='classCardInfo'>
                                <img class='invertColor' src='assets/icons/subject.png'><span>".$subject['classSubject']."</span>
                            </div>
                        </div>
                        <div class='classCardFace'>".$subject['classSubject']."</div>
                    </div>
                </div>";
            }
        }
    }elseif($target=="myclassmates"){
        $getClassmateQuery="SELECT * FROM utclassmate WHERE userid='$UTuserid'";
        $getClassmate=mysqli_query($con,$getClassmateQuery);
        if(mysqli_num_rows($getClassmate)>0){
            while($classmate=mysqli_fetch_assoc($getClassmate)){
                echo "<div class='classCardContainer'>
                    <div class='classCardinnerContainer'>
                        <div class='classCardDetail'>
                            <div class='classCardInfo'>
                                <img class='invertColor' src='assets/icons/profile.png'><span>".$classmate['classmateName']."</span>
                            </div>
                            <div class='classCardInfo'>
                                <img class='invertColor' src='assets/icons/phone.png'><span>".$classmate['classmatePhone']."</span>
                            </div>
                            <div class='classCardInfo'>
                                <img class='invertColor' src='assets/icons/location.png'><span>".$classmate['classmateAddress']."</span>
                            </div>
                        </div>
                        <div class='classCardFace'>".$classmate['classmateName']."</div>
                    </div>
                </div>";
            }
        }
    }


    echo "<div data-target='".$target."' class='myclassAddBtn'>
        <img src='assets/icons/add.png'>
    </div>";
}


?>

<div class="myClassAndNewForm addNewTeacherForm">
    <input type='text' class='myClassaddNewTextBox teacherNameInput' placeholder="Teacher Name">
    <select class="myClassaddNewTextBox teacherSubjectInput">
        <?php
            $getsubsQuery="SELECT * FROM utclassSubjects WHERE userid='$UTuserid'";
            $getsubs=mysqli_query($con,$getsubsQuery);
            if(mysqli_num_rows($getsubs)>0){
                while($subject=mysqli_fetch_assoc($getsubs)){
                    echo "<option value='".$subject['classSubject']."'>".$subject['classSubject']."</option>";
                }
            }else{
                echo "<option>No Subjects!</option>";
            }
        ?>
    </select>
    <input type='text' class='myClassaddNewTextBox teacherPhoneInput' placeholder="Phone">
    <div class="myClassAddBtn addClassTeacherBtn">Add Teacher</div>
</div>

<div class="myClassAndNewForm addNewSubjectForminClass">
    <input type="text" class='myClassaddNewTextBox myClassSubjectInput' placeholder="Subject">
    <div class="myClassAddBtn myClassAddSubjectBtn">Add Subject</div>
</div>

<div class="myClassAndNewForm addNewClassMatesForm">
    <input type="text" class='myClassaddNewTextBox classmateNameInput' placeholder="Name">
    <input type="text" class='myClassaddNewTextBox classmatePhoneInput' placeholder="Phone">
    <textarea class="myClassaddNewTextarea classmateAddressInput" placeholder="Address"></textarea>
    <div class="myClassAddBtn addClassmateBtn">Add Classmate</div>
</div>