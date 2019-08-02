$(document).ready(function() {


    var pmc = $(".profileMainContainer");
    var UTuser = pmc.attr("data-UTuser");
    var profileContainer = $(".profileContainer");


    $(".showHideProfile").on("click", function() {
        pmc.css("display", "flex");
        profileContainer.load("model/profile.php");
    });



});