function recoreAlert(message, type) {
    $(".recoreAlert").css("animation-name", "recoreAlert");
    $(".recoreAlertMessage").text(message);
    if (type == 0) {
        $(".recoreAlertIcon").attr("src", "assets/icons/rcaerror.png");
        $(".recoreAlert").removeClass("recoreSuccess");
        $(".recoreAlert").addClass("recoreError");
    } else if (type == 1) {
        $(".recoreAlertIcon").attr("src", "assets/icons/rcaok.png");
        $(".recoreAlert").removeClass("recoreError");
        $(".recoreAlert").addClass("recoreSuccess");
    }
    setTimeout(() => {
        $(".recoreAlert").css("animation-name", "");
    }, 4000);
}



$(document).on("mousemove", function(e) {
    x = e.pageX;
    y = e.pageY;
    $('.doubleClickToDel').css("top", y + "px");
    $('.doubleClickToDel').css("left", x + "px");
});

$(document).on("mouseover", ".classCardContainer", function() {
    $('.doubleClickToDel').css("display", "block");
});
$(document).on("mouseout", ".classCardContainer", function() {
    $('.doubleClickToDel').css("display", "none");
});


$(document).on("mouseover", ".UTeachTaskContainer", function() {
    $('.doubleClickToDel').css("display", "block");
});
$(document).on("mouseout", ".UTeachTaskContainer", function() {
    $('.doubleClickToDel').css("display", "none");
});