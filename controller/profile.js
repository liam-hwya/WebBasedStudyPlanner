$(document).ready(function() {


    var pmc = $(".profileContainer");
    var UTuser = pmc.attr("data-UTuser");


    $(".showHideProfile").on("click", function() {
        pmc.css("display", "flex");
        pmc.load("model/profile.php");
    });

    $(document).on("click",".profilePPcontainer",function(){
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
            $(".profilePPcontainer").attr("style","background-image: url('"+e.target.result+"')");
          }
          reader.readAsDataURL(input.files[0]);
        }
      }


    $(document).on("change",".newPPselector",function(){
        oneImgPreview(this);
    });

});e.target.result