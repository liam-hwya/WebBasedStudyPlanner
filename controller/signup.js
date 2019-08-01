$(document).ready(function() {

    //get each input box state
    var FnStatus = $(".sign_up_first_name").attr("id"); //first name state
    var SnStatus = $(".sign_up_last_name").attr("id"); //last nsme state
    var EmStatus = $(".sign_up_email").attr("id"); //email state
    nextBtnStatus();


    const pattern = { //reg[ex] pattens
        name: /^[a-z\d ]{1,20}$/i,
        email: /^([a-z\d\.-]+)@([a-z|d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/
    }

    function validate(value, regex) { //vilidate if the input is right format
        status = regex.test(value);
        return status;
    }

    $("input").on("input blur", function() { //get input and send to validate function age manage status
        input = $(this); //typing input box
        value = input.val(); //value of typing input box
        type = $(this).attr('name'); //name of typing input box
        status = validate(value, pattern[type]); //return value from validate function
        if (status == "false") {
            input.addClass("text_box_error"); //add red border to wrong format input box
            input.attr("id", "invalid"); //reassign input box state
        } else {
            input.removeClass("text_box_error"); //remove red border to wrong format input box
            input.attr("id", "valid"); //reassign input box state
        }

        //reassign input boxs states
        FnStatus = $(".sign_up_first_name").attr("id");
        SnStatus = $(".sign_up_last_name").attr("id");
        EmStatus = $(".sign_up_email").attr("id");
        nextBtnStatus();
    });

    function nextBtnStatus() { //check inputs states and control button enable/disable
        if (FnStatus == "valid" && SnStatus == "valid" && EmStatus == "valid") {
            $(".signup_first_next").css("opacity", "1");
        } else {
            $(".signup_first_next").css("opacity", "0.5");

        }
    }



});