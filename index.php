<?php
    session_start();
    if(!$_SESSION['UTuser']){
        header("location:utime.php");
    }else{
        $UTuser=$_SESSION['UTuser'];
    }

    if(isset($_SESSION['pagename'])){
        $currentPage=$_SESSION['pagename'];
    }else{
        $currentPage="dashboard";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>U-Time</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/timetable.css">
    <link rel="stylesheet" href="resources/css/recore.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/community.css">
    <link rel="stylesheet" href="assets/css/taskcreator.css">
    <link rel="stylesheet" href="assets/css/task.css">
    <link rel="stylesheet" href="assets/css/projects.css">
    <link rel="stylesheet" href="assets/css/analyse.css">
    <link rel="stylesheet" href="assets/css/myclass.css">
    <link rel="stylesheet" href="assets/css/exam.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/recoreAlert.css">
</head>

<body data-calPg="day" data-page="<?php echo $currentPage;  ?>" data-id="<?php echo $UtimeUserId ?>">
        <div class="profileContainer"  data-UTuser="<?php echo $UTuser; ?>">
            
        </div>

    <div class="dashboard_main_container">
    <!--============= Top Bar Start============ -->
        <div class="dashboard_top_bar">
            <div class="showHideMenu"><img src="assets/icons/menu.png"></div>
            <div id="dashboard"  class="menuAtTop"><img src="assets/icons/dashboard.png"></div><!--Timeline Menu-->
            <div class="theSpaceBetweenUnME"></div><!--The space between You and Me :( -->
            <!-- <div class="menuAtTop"><img src="assets/icons/feedback.png"></div> -->
            <div id="analyse" class="menuAtTop"><img src="assets/icons/timeline.png"></div><!--Timeline Menu-->
            <div class="showHideNoti"><img src="assets/icons/noti.png"></div><!--View Notis-->
            <div class="showHideProfile"><img src="assets/icons/Pp.png"></div><!--Show Profile-->
        </div>
    <!-- ====================Top Bar End================== -->
        
        <div class="dashboard_container">

        <!-- =================================Menu Bar Start============================================== -->
            <div class="dashboard_menu_bar">
                <div id="dashboard" class="menu hideOnSmall" >
                    <div class="menu_icon"><img src="assets/icons/dashboard.png"></div>
                    <div class="menu_text">Dashboard</div>
                </div>
                <div id="timetable" class="menu " >
                    <div class="menu_icon"><img src="assets/icons/planner.png"></div>
                    <div class="menu_text">Time Table</div>
                </div>
                <div id="projects" class="menu " >
                    <div class="menu_icon"><img src="assets/icons/project.png"></div>
                    <div class="menu_text">Projects</div>
                </div>
                <div id="community" class="menu " >
                    <div class="menu_icon"><img src="assets/icons/world.png"></div>
                    <div class="menu_text">Community</div>
                </div>
                <div id="exam" class="menu " >
                    <div class="menu_icon"><img src="assets/icons/exam.png"></div>
                    <div class="menu_text">Exam</div>
                </div>
                <div id="myclass" class="menu " >
                    <div class="menu_icon"><img src="assets/icons/class.png"></div>
                    <div class="menu_text">My Class</div>
                </div>
                <div id="feedback" class="menu hideOnSmall" >
                    <div class="menu_icon"><img src="assets/icons/feedback.png"></div>
                    <div class="menu_text">Feedback</div>
                </div>
            </div>
         <!-- =================================Menu Bar End============================================== -->
            <div class="Utime_main_body">
                <!--Blah blah blah-->
            </div>
        </div>
    </div>

    <div class="recoreAlert">
        <img src="" class='recoreAlertIcon'>
        <div class="recoreAlertMessage"></div>
    </div>

    <script src="resources/js/jquery.js"></script>
    <script src="assets/js/recoreAlert.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="controller/timetable.js"></script>
    <script src="controller/profile.js"></script>
    <script src="controller/community.js"></script>
    <script src="controller/imagePreview.js"></script>
    <script src="controller/exam.js"></script>
    <script src="controller/project.js"></script>
    <script src="controller/dashboard.js"></script>
    <script src="controller/myclass.js"></script>
</body>

</html>