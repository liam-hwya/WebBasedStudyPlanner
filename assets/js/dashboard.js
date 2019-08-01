$(document).ready(function() {
    // document.body.requestFullscreen();

    $("#dashboard").addClass("active_Top_menu"); //set dashboard as first page (Home Page)

    var UtimeMainBody = $(".Utime_main_body"); //UtimeMainBody is the place to show all return data for all pages
    var userId = $("body").data("id"); //you know what it is :p 
    UtimeMainBody.load("view/dashboard.php", { //just load data from dashboard.php
        userId: userId //send data
    });

    $(".menu").on("click", function() { //navigate pages
        $(".menu").removeClass("menuanimation"); //remove animation class from all menus
        $(".menuAtTop").removeClass("active_Top_menu"); //remove active class from all menus in the top bar
        $(this).addClass("menuanimation"); //animation on(click) menus btn
        $(".menu").removeClass("active_menu"); //remove active class from all menus
        $(this).addClass("active_menu"); //add Active class to clicked menu
        var pageName = $(this).attr("id");
        var fileName = pageName + ".php";
        var UtimeMainBody = $(".Utime_main_body");
        UtimeMainBody.load("view/" + fileName, { //just load data from <clicked_menu_name>.php
            userId: userId //send data
        });

    });

    $(".menuAtTop").on("click", function() { //navigate pages
        $(".menu").removeClass("active_menu");
        $(".menuAtTop").removeClass("active_Top_menu");
        $(this).addClass("active_Top_menu");
        $(".Utime_main_body").html($(".active_Top_menu").attr("id"));
        var pageName = $(this).attr("id");
        var fileName = pageName + ".php";
        var UtimeMainBody = $(".Utime_main_body");
        UtimeMainBody.load("view/" + fileName, { //just load data from <clicked_menu_name>.php
            userId: userId //send data
        });
    });

    $(".showHideMenu").on("click", function() { //show hide menus
        $(".menu").toggleClass("remove10px");
        $(".menu_text").toggle(200);
    });

});