<?php
    require_once("../model/auth.php");
    $_SESSION['pagename']="projects";
?>

<div class="projectsMagePageContainer">
    
    <div class="thisProjectContainer">

    </div>



    <div class="projectListContainer">

    </div>


    <div class="addNewProject">
            <span>New Project</span>
            <div class="addNewProjectIcon"><img src="assets/icons/add.png" alt=""></div>
    </div>
    <div class='addNewProjectForm'>
        <input type="text" placeholder="Project Name" class='addNewProjectName'>
        <input type="date" class='addNewProjectDate'>
        <div class="createProjectBtn">Create</div>
    </div>

    <script>
        $(".projectListContainer").load("model/getProjectsList.php");
        $(".thisProjectContainer").load("model/getProjectDetail.php");
    </script>

    
    

</div>