<?php
    require_once("../model/auth.php");
    $_SESSION['pagename']="projects";
?>

<div class="projectsMagePageContainer">
    
    <div class="projectListContainer">

        <div class="addNewProjectBtn"><img src="assets/icons/add.png"></div>

        <div class="eachProjectsInList bdblue">
            <div class="eachProjectTitle">Star Link</div>
            <div class="eachProjectsTasksContainer">
                <div class="eachProjectTask bgGG">
                    <div class="projectTaskController"></div>
                    <div class="projectTaskText">Task to do some thing for star link project</div>
                </div>
            </div>
        </div>


        <div class="eachProjectsInList bdred">
            <div class="eachProjectTitle">UTime</div>
            <div class="eachProjectsTasksContainer">
                <div class="eachProjectTask bgRed">
                    <div class="projectTaskController"></div>
                    <div class="projectTaskText">User Signup and Login</div>
                </div>
                <div class="eachProjectTask bgOrange">
                    <div class="projectTaskController"></div>
                    <div class="projectTaskText">Add Tasks in Calendar</div>
                </div>
            </div>
        </div>

        <div class="eachProjectsInList bdgreen">
            <div class="eachProjectTitle">Plegma Web Design</div>
        </div>
    </div>

    


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

</div>