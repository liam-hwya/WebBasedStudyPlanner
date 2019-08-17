$(document).ready(function() {


    var pmc = $(".profileContainer");
    var UTuser = pmc.attr("data-UTuser");


    $(".showHideProfile").on("click", function() {
        pmc.css("display", "flex");
        pmc.load("model/profile.php");
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

    $(document).on("click", function(e) {
        if (e.target.className == "profileContainer" || e.target.className == "") {
            //donothing
        } else {
            $(".profileContainer").css("display", "none");
        }
    });

});