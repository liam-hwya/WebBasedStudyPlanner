$(document).ready(function() {

    $('input').bind('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });



    //get each input box state
    var FnStatus = $(".sign_up_first_name").attr("id"); //first name state
    var SnStatus = $(".sign_up_last_name").attr("id"); //last nsme state
    var EmStatus = $(".sign_up_email").attr("id"); //email state
    var passStatus = $(".sign_up_password").attr("id"); //password state
    nextBtnStatus();



    const pattern = { //reg[ex] pattens
        name: /^[a-z\d ]{1,20}$/i,
        email: /^([a-z\d\.-]+)@([a-z|d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
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
            $(".signup_first_next").css("cursor", "pointer");
            return true;
        } else {
            $(".signup_first_next").css("opacity", "0.5");
            $(".signup_first_next").css("cursor", "not-allowed");
            return false;
        } //you know wtf i wrote,right?
    }



    $(".signup_first_next").on("click", function() { //next btn on first signup page

        function isEmailAvailable(email) {


        }

        var thisStatus = nextBtnStatus();
        if (thisStatus === true) {
            var newEmail = $(".sign_up_email").val();
            $.post("model/checkEmailExist.php", {
                email: newEmail
            }, function(data, status) {
                console.log(data);
                if (data == 1) {
                    $(".sign_up_form_one").css("display", "none"); //hide name,emilm inputs
                    $(".sign_up_form_two").css("display", "flex"); //show password input
                    $(".Step1").removeClass("workingStep"); //update Signup Prograss
                    $(".Step1").addClass("completeStep"); //update Signup Prograss
                    $(".Step2").removeClass("waitingStep"); //update Signup Prograss
                    $(".Step2").addClass("workingStep"); //update Signup Prograss
                    $(".textSteps").html("Create a password"); //update Signup Prograss
                } else {
                    recoreAlert("email is already taken", 0);
                }
            });
        } else {
            recoreAlert("!OPPS", 0);
        }
    });



    function passNextStatus() { //check if name ,email and password are valid or not
        var pass = $(".sign_up_password").val();
        var passCount = pass.length; //get password count
        name_pasStatus = nextBtnStatus(); //get name,email valid checking function
        if (name_pasStatus == true && passCount > 7) {
            return true;
        } else {
            return false;
        }
    }


    $(".signup_second_next").on("click", function() { //next btn on second page of signup page
        var thisStatus = passNextStatus();
        if (thisStatus === true) {
            $(".sign_up_form_two").css("display", "none");
            $(".Step2").removeClass("workingStep");
            $(".Step2").addClass("completeStep");
            $(".Step3").removeClass("waitingStep");
            $(".Step3").addClass("workingStep");
            $(".textSteps").html("What you are interested in?");
            $(".sign_up_form_three").css("display", "flex");
            $(".utime_name_text").html("Signup")
            $(".passionListContainer").load("model/passionList.php");
        } else {
            recoreAlert("Your Password is Too Short", 0);
        }
    });




    var myPassions = []; //set array for passion list
    $(document).on("click", ".selectable", function() { //add value to passion list on click
        var passion = $(this).html();
        myPassions.push(passion);
        $(this).addClass("passionAdd");
        $(this).css("background", "#9ed2a1");
        $(this).removeClass("selectable");
    });
    $(document).on("click", ".passionAdd", function() { //remove value from passion list 
        var removePassion = $(this).html();
        var index = myPassions.indexOf(removePassion);
        myPassions.splice(index, 1);
        console.log(myPassions);
        $(this).css("background", "#aaa");
        $(this).addClass("selectable");
        $(this).removeClass("passionAdd");
    });

    $(".signup_third_next").on("click", function() { //final step
        $thisStatu = passNextStatus();
        if ($thisStatu === true) {
            var firstName = $(".sign_up_first_name").val();
            var lastName = $(".sign_up_last_name").val();
            var Email = $(".sign_up_email").val();
            var password = $(".sign_up_password").val();
            var passionsJson = JSON.stringify(myPassions);
            console.log(passionsJson);
            $.post("model/createAcc.php", {
                passions: passionsJson,
                firstName: firstName,
                lastName: lastName,
                Email: Email,
                password: password
            });

            $(".sign_up_form_three").css("display", "none");
            $(".signUpSteps").removeClass("completeStep");
            $(".signUpSteps").removeClass("workingStep");
            $(".signUpSteps").removeClass("waitingStep");
            $(".signUpSteps").addClass("finishedStep");
            $(".signUpSteps").html("<img src='assets/icons/completed.png'>");
            $(".textSteps").html("let get started!");
            $(".sign_up_form_four").css("display", "flex");
            $(".utime_name_text").html("Welcome " + firstName + " " + lastName);

        } else {
            alert("noooo bor");
        }


    });

    $(".signup_four_next").on("click", function() {
        window.location.href = "index.php";
    });

    // var firstName=$(".sign_up_first_name").val();
    // var lastName=$(".sign_up_last_name").val();
    // var Email=$(".sign_up_email").val();
    // // alert(firstName+" "+lastName+"'s Email is "+Email);
    // $(".sign_up_form_one").load("model/register.php",{
    //     firstName:firstName,
    //     lastName:lastName,
    //     email:Email
    // })



});