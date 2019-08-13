<?php
    require_once("../model/auth.php");
    $_SESSION['pagename']="projects";
?>

<div class="projectsMagePageContainer">
    
    <div class="thisProjectContainer">

        <div class="projectTitle">The Project Title</div>

        <div class="thisProjectTask">
            <div class="mainTask bgGG">
                <div class="mainTaskControl"></div>
                <div class="mainTaskText">The is the main task text</div>
            </div>  
            <div class="subTaskContainer">
                <div class="subTask bgRed">
                    <div class="subTaskControl"></div>
                    <div class="subTaskText">Sub Task</div>
                </div> 
            </div>
        </div>
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
        <div class="createExamBtn">Create</div>
    </div>

    <script>
        $(".projectListContainer").load("model/getProjectsList.php");
    </script>

    
    

</div>