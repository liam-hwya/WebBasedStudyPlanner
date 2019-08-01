$(document).ready(function() {

    // var data = "sendData";
    // $(".utime_calendar").load("backend.php", {
    //     data: data
    // });

    $(document).on("click", ".btns", function() {
        var UtimeMainBody = $(".Utime_main_body");
        var data = "something";
        var change = $(this).attr("data-id");
        UtimeMainBody.load("view/timetable.php" + change, {
            data: data
        });
        // alert(change);
    });

    $(document).on("click", "td", function() {
        // var m = $(this).attr("data-m");
        // var y = $(this).attr("data-y");
        // var d = $(this).attr("data-d");
        if ($(this).hasClass('planTaken')) {
            alert($(this).attr("class").split(" ")[0]);
        } else {
            alert("let add a plan");
        }
    });

    $(document).on("mouseover", "td", function() {
        if ($(this).hasClass('planTaken')) {
            $(this).css("background", "red");
        } else {
            $(this).css("background", "#333");
            $(this).css("color", "white");
        }
    });
    $(document).on("mouseout", "td", function() {
        if ($(this).hasClass('planTaken')) {
            $(this).css("background", "green");
        } else {
            $(this).css("background", "");
            $(this).css("color", "#333");
        }
    });



});