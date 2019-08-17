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