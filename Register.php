<?php 
    //include auth.php file on all secure pages
    include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        body {
            /* background-image: url(images/bg.png);
            background-size: cover; */
            background-color: #151d27;

        }

        #main {
            background-image: url(assets/images/reg&log\ Bg.png);
            background-size: cover;
        }

        img {
            width: 110px;
            height: auto;
        }

        .logocont {
            display: flex;
            justify-content: center;
        }

        h1 {
            color: #49688D;
        }

        /* form starts here */
        .formcont {
            padding: 10%;
        }

        .formcont>input {
            padding: 3%;
            width: 100%;
            border: none;
            border-bottom: 1px solid #49688D;
            background: none;
        }

        /* form ends here  */

        /* button starts here */
        .btncont {
            align-self: center;
            margin-left: 17%;
            margin-right: 17%;
        }

        .btncont>input {
            background-color: #151d27;
            color: white;
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 24px;
        }

        /* .btncont>a>#login {
            width: 60%;
            margin-top: 10%;
            margin-left: 20%;
            margin-right: 20%;
        } */
         #CandT{
            font-size: 14px;
         }
    </style>
</head>

<body class="container pt-sm-2">
    <div class="row">
        <div class="col-0 col-md-4"></div>
        <div class="col-0 col-md-4 pt-5 pb-5" id="main">
            <!-- logo image strts here  -->
            <div class="logocont">
                <div></div>
                <div>
                    <img src="assets/images/logo.png">
                </div>
                <div></div>
            </div>
            <!-- logo ends here -->

            <!-- name starts here  -->
            <div class="text-center pt-4">
                <h1>PIKAFI</h1>
            </div>
            <!-- name ends here  -->

            <!-- reg info starts here  -->
            <div class="formcont">
                <p><b>Hey!,</b> Welcome..</p>
                <input type="email" id="email" placeholder="Enter Email">
                <input type="text" id="username" placeholder="Enter Username">
                <input type="password" id="password" min="8" max="20" placeholder="Enter Password">
                <input type="password" id="confirm_password" min="8" max="20" placeholder="Confirm password">
            </div>
            <!-- reg info ends here  -->

            <div class="container-fluid ms-2 me-4" id="CandT">
                <!-- Terms and conditions starts here  -->
                <div class="text-start">
                    <p> <input type="checkbox"> I Have Read and Agree to PIKAFI'S <a href="TandC.html">Terms and Conditions</a><br>
                        <input type="checkbox"> I Aknowledge that I'm not a citizen of USA or UK nor do I base in any of the countries</p>
                </div>
                <!-- Terms and conditions ends here  -->
            </div>

            <!-- button starts here -->
            <div class="btncont">
                <p class="text-danger text-center error_text"></p>
                <input id="register" type="button" value="Register">
            </div>
            <!-- button ends here -->

            <div class="text-center mt-3">
                <a href="Login.php">Already have an account?</a>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="register.js"></script>
</body>

</html>