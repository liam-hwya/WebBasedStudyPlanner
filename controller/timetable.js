$(document).ready(function() {

    // var data = "sendData";
    // $(".utime_calendar").load("backend.php", {
    //     data: data
    // });


    $(document).on("mousemove", function(ev) {
        var X = $('body').offset().left;
        var Y = $('body').offset().top;
        mouseX = ev.pageX - X;
        mouseY = ev.pageY - Y;
        // $(".position").html(mouseX + " and " +    mouseY);
        $(".planContOnMouse").css("top", mouseY + 10);
        $(".planContOnMouse").css("left", mouseX + 10);
    });

    $(document).on("mouseover", "td", function() {
        $(".planContOnMouse").css("display", "block");
        if ($(this).hasClass("planTaken")) {
            $(".planContOnMouse").css("background", "green");
        }
        $(".planContOnMouse").html($(this).attr("class").split(" ")[0]);
    });
    $(document).on("mouseout", "td", function() {
        $(".planContOnMouse").css("display", "none");
        $(".planContOnMouse").css("background", "red");
    });

    $(document).on("click", ".changeCalendarMonth", function() {
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
        var target = $(".EachDaytimeLineContainer");
        var dateShower = $(".todayDateAtCalenda");
        if ($(this).hasClass('planTaken')) {
            var data = $(this).attr("class").split(" ")[0];
        } else {
            var data = $(this).attr("class");
        }
        target.html(data);
        dateShower.html(data);
        $(".timeTableTypeSwitch").click();
    });

    $(document).on("click", ".timeTableTypeSwitch", function() {
        $(".switchToCalView").toggle();
        $(".switchToDayView").toggle();
        $(".timeTableBody").toggle();
        $(".changeCalendarMonth").toggle();
        $(".eachDayTimeTableContainer").toggle();
        $(".todayDayShower").toggle();
    });



});