$(document).ready(function() {
    $(document).on("click", ".dashboardEachExamContainer", function() {
        var examid = $(this).attr("data-examid");
        $(".Utime_main_body").load("view/exam.php", {
            dbexamid: examid
        });

        $(".menu").removeClass("menuanimation"); //remove animation class from all menus
        $(".menuAtTop").removeClass("active_Top_menu"); //animation on(click) menus btn
        $(".menu").removeClass("active_menu");
    });


    $(document).on("click", ".dashboardEachProjectContainer", function() {
        var projectid = $(this).attr("data-projectid");
        $(".Utime_main_body").load("view/projects.php", {
            dbprojectid: projectid
        });

        $(".menu").removeClass("menuanimation"); //remove animation class from all menus
        $(".menuAtTop").removeClass("active_Top_menu"); //animation on(click) menus btn
        $(".menu").removeClass("active_menu");
    });
});