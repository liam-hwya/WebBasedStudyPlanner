$(document).ready(function() {

    $(document).on("click", ".addNewProject", function() {
        $(this).toggleClass("addBtnImgRotate");
        $(".addNewProjectForm").toggle();
    });


});