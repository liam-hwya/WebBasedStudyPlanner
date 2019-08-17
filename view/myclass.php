<?php
    require_once("../model/auth.php");
    $_SESSION['pagename']="myclass";
?>

<div class="myClassMainContainer">
    <div class="myClassMenus">
        <div data-target='myteachers' class="myClassMenu"><img src="assets/icons/exam.png"><span>My Teachers</span></div>
        <div data-target="mysubjects" class="myClassMenu"><img src="assets/icons/subject.png"><span>My Subjects</span></div>
        <div data-target="myclassmates" class="myClassMenu"><img src="assets/icons/classmate.png"><span>My Classmates</span></div>
    </div>
    <div class="myClassDataContainer">
        <script>
            var target="myteachers";
            $(".myClassDataContainer").load("model/myclass.php",{
                target:target
            });
        </script>
    </div>
</div>