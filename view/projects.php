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
        <textarea placeholder="Description" class='addNewProjectDescription'></textarea>
        <label class='addNewProjectDateLabel'>Deadline</label>
        <input type="date" class='addNewProjectDate'>
        <div class="createProjectBtn">Create</div>
    </div>
    <?php 
        if(isset($_POST['dbprojectid'])){
            $getprojectDetail="$('.thisProjectContainer').load('model/getProjectDetail.php',{
                projectid:".$_POST['dbprojectid']."
            })";
        }else{
            $getprojectDetail="$('.thisProjectContainer').load('model/getProjectDetail.php')";
        }
    ?>

    
    <script>
        $(".projectListContainer").load("model/getProjectsList.php");
        <?php echo $getprojectDetail;  ?>
    </script>

    
    
</div>