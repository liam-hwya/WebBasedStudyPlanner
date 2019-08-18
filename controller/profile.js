$(document).ready(function() {


    var pmc = $(".profileContainer");
    var UTuser = pmc.attr("data-UTuser");


    $(".showHideProfile").on("click", function() {
        if ($(this).hasClass("showingPP")) {
            pmc.css("display", "none");
            $(this).removeClass("showingPP");
        } else {
            pmc.css("display", "flex");
            pmc.load("model/profile.php");
            $(this).addClass("showingPP");
        }
    });

    $(".Utime_main_body").on("scroll", function() {
        $(".profileContainer").css("display", "none");
        $(".showHideProfile").removeClass("showingPP");
    });

    $(document).on("click", ".profilePPcontainer", function() {
        $(".newPPselector").click();
    });


    // var imagesPreview = function(input) {
    //     if (input.files) {
    //         var filesAmount = input.files.length;
    //         console.log(input.files);

    //         for (i = 0; i < filesAmount; i++) {
    //             var reader = new FileReader();

    //             reader.onload = function(event) {
    //                 $(".profilePPcontainer").attr("style","background-image: url('"+event.target.result+"')");
    //             }

    //             reader.readAsDataURL(input.files[i]);
    //         }
    //     }
    // };

    function oneImgPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".profilePPcontainer").attr("style", "background-image: url('" + e.target.result + "')");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).on("change", ".newPPselector", function(e) {
        e.preventDefault();
        var $thisFormObj = $(this).closest('form');
        var formdata = new FormData($thisFormObj[0]);

        $.ajax({
            type: "POST",
            url: "model/updatePP.php",
            data: formdata,
            processData: false,
            contentType: false,
            dataType: "json"
        });
        oneImgPreview(this);
        $(".profileContainer").css("display", "none");
        recoreAlert("Profile Picture Updated", 1);
    });



});