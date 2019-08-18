$(document).ready(function() {

    $(document).on("click", ".showHideNoti", function() {
        if ($(this).hasClass("showingNoti")) {
            $(".notificationContainer").css("display", "none");
            $(this).removeClass("showingNoti");
        } else {
            $(".notificationContainer").css("display", "flex");
            $(".notificationContainer").load("model/noti.php");
            $(this).addClass("showingNoti");
        }
    });

    $(".Utime_main_body").on("scroll", function() {
        $(".notificationContainer").css("display", "none");
        $(".showHideNoti").removeClass("showingNoti");
    });

    $(document).on("click", ".accessPopupNoti", function() {
        var taskid = $(this).attr("data-taskid");
        var status = 1;
        $.post("model/successTask.php", {
            taskid: taskid,
            status: status
        }, function(data, status) {
            //doSomething
        });
        $(".timeTableTaskAnalyseContainer").load("model/taskAnalyse.php");
        $('.utimeNotificationBox').css("display", "none");
    });

    $(document).on("click", ".declinePopupNoti", function() {
        var taskid = $(this).attr("data-taskid");
        var status = 0;
        $.post("model/successTask.php", {
            taskid: taskid,
            status: status
        }, function(data, status) {
            //doSomething
        });
        $(".timeTableTaskAnalyseContainer").load("model/taskAnalyse.php");
        $('.utimeNotificationBox').css("display", "none");
    });


});