<?php
    require_once("../model/auth.php");
    $_SESSION['pagename']="exam";
?>

<div class="examMainContainer">
    <div class="exampListContainer">

        <div class="examInListContainer bgGG">
            <div class="examTitle">
                <div class="examTitleName">First Semester</div>
                <div class="examTitleStatus text-green">done</div>
            </div>
            <div class="examSubList">
                <div class="subjectsInExamList">Chemistry</div>
                <div class="subjectsInExamList">Physics</div>
                <div class="subjectsInExamList">Mathematics</div>
                <div class="subjectsInExamList">English</div>
                <div class="subjectsInExamList">Programming</div>
                <div class="subjectsInExamList">Networking</div>
            </div>
        </div>

        <div class="examInListContainer bdblue">
            <div class="examTitle">
                <div class="examTitleName">Final Exam</div>
                <div class="examTitleStatus text-red">pending</div>
            </div>
            <div class="examSubList">
                <div class="subjectsInExamList">English</div>
                <div class="subjectsInExamList">Programming</div>
                <div class="subjectsInExamList">Physics</div>
                <div class="subjectsInExamList">Mathematics</div>
                <div class="subjectsInExamList">Networking</div>
                <div class="subjectsInExamList">Chemistry</div>
            </div>
        </div>

        <div class="addNewExamBtn"><img src="assets/icons/add.png"></div>

    </div>
    <div class="eachExamContainer">
        <div class="eachExamHeader">    
            <div class="eachExamTitle">Final Exam</div>
        </div>
        <div class="eachExamSubjectList">
            <table>
                <tr class="eachExamTableHeader">
                    <td>Subject</td>
                    <td>Date</td>
                    <td>From Time</td>
                    <td>To Time</td>
                    <td>Room No</td>
                    <td>Table No</td>
                    <td>Min-Mark</td>
                    <td></td>
                </tr>
                <tr class="trbg1">
                    <td>chemistry</td>
                    <td>2019 Dec,21</td>
                    <td>9:00 AM</td>
                    <td>12:00AM</td>
                    <td>404</td>
                    <td>200</td>
                    <td>40</td>
                    <td class="settingsForEachSubjects"><img src="assets/icons/dotmenu.png" alt=""></td>
                </tr>
                <tr class="">
                    <td>Physic</td>
                    <td>2019 Dec,22</td>
                    <td>9:00 AM</td>
                    <td>12:00AM</td>
                    <td>404</td>
                    <td>200</td>
                    <td>40</td>
                    <td><img src="assets/icons/dotmenu.png" alt=""></td>
                </tr>
                <tr class="trbg1">
                    <td>Mathematics</td>
                    <td>2019 Dec,23</td>
                    <td>9:00 AM</td>
                    <td>12:00AM</td>
                    <td>404</td>
                    <td>200</td>
                    <td>40</td>
                    <td class="settingsForEachSubjects"><img src="assets/icons/dotmenu.png" alt=""></td>
                </tr>
                <tr class="">
                    <td>English</td>
                    <td>2019 Dec,24</td>
                    <td>9:00 AM</td>
                    <td>12:00AM</td>
                    <td>404</td>
                    <td>200</td>
                    <td>40</td>
                    <td><img src="assets/icons/dotmenu.png" alt=""></td>
                </tr>
                <tr class="trbg1">
                    <td>Programming</td>
                    <td>2019 Dec,25</td>
                    <td>9:00 AM</td>
                    <td>12:00AM</td>
                    <td>404</td>
                    <td>200</td>
                    <td>40</td>
                    <td class="settingsForEachSubjects"><img src="assets/icons/dotmenu.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
</div>