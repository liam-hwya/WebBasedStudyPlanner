$(document).ready(function() {

    $(document).on("click", ".addNewProject", function() {
        $(this).toggleClass("addBtnImgRotate");
        $(".addNewProjectForm").toggle();
    });


    //create New Project
    $(document).on("click",".createProjectBtn",function(){
        var projectName=$(".addNewProjectName").val();
        var projectDate=$(".addNewProjectDate").val();
        $.post("model/createNewProject.php",{
            projectName:projectName,
            projectDate:projectDate
        },function(data,status){
            alert(data);
        });
        $(".projectListContainer").load("model/getProjectsList.php");
        $(".addNewProjectForm").toggle();
    });
        

    //view project detail
    $(document).on("click",".eachProjectContainer",function(){
        var projectid=$(this).attr("data-projectid");
        $(".thisProjectContainer").load("model/getProjectDetail.php",{
            projectid:projectid
        });
    });

});