<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/signup.css">
    <link rel="stylesheet" href="resources/css/recore.css">
</head>

<body>


    <div class="container welcome_container">
        <div class="welcome_main_container">
            <img src="assets/icons/utime.png" alt="" class="plegma_logo">
            <span class="utime_name_text">Sign Up</span>
            <div class="signUpsteps">
                <div class="GUIsteps">
                    <span class="Step1">1</span>
                    <span class="Step2">2</span>
                    <span class="Step3">3</span>
                </div>
                <div class="textSteps">Who are you?</div>
            </div>
            <form method="post" class="sign_up_form_one">
                <div class="name_inputs">
                    <input type="text" name="name" placeholder="First name" id="invalid" class="sign_up_first_name"><!--User first name for signup-->
                    <input type="text" name="name" placeholder="Last name" id="invalid" class="sign_up_last_name"><!--User Last name for signup-->
                </div>
                <input type="email" name="email" placeholder="Email" id="invalid" class="sign_up_email"><!--User Email for signup-->
                <div class="signup_first_next">Next</div><!--Next button-->
            </form>
            <form method="post" class="sign_up_form_two">
                <input type="password" name="password" placeholder="Password" id="invalid" class="sign_up_password"><!--User Email for signup-->
                <div class="signup_second_next">Next</div><!--Next button-->
            </form>
            <form method="post" class="sign_up_form_three">
                <div class="passionListContainer"></div>
                <div class="signup_second_next">Next</div>
            </form>
            <span class="use_phone"></span><!--user phone or email btn-->
        </div>
        <div class="copy_right_bar">copyright@U-Time</div>
    </div>



    <script src="resources/js/jquery.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="controller/signup.js"></script>
</body>

</html>