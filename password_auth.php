<?php 
    //include auth.php file on all secure pages
    include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email auth Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

        #name {
            padding-top: 15%;
        }

        /* form starts here */
        .formcont {
            padding: 10%;
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

        .btncont>a>#login {
            width: 60%;
            margin-top: 10%;
            margin-left: 20%;
            margin-right: 20%;
        }
        .auth_container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;

        }
        .auth_input{
            width: 80%;
            padding: 0.6rem;
            border: 4px solid #49688D;
            border-radius: 0.3rem;
            font-weight: bolder;
            font-size: larger;
            text-align: center;
        }
    </style>
</head>

<body class="container pt-md-0">
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
            <div id="name" class="text-center">
                <h1>PIKAFI</h1>
            </div>
            <!-- name ends here  -->

            <!-- reg info starts here  -->
            <div class="formcont">
                <p><b>Hey!, </b> <br>Enter code sent to your email below...</p>
                <div class="auth_container mt-3">
                    <input type="text" class="auth_input">
                    <input type="text" class="auth_input">
                    <input type="text" class="auth_input">
                    <input type="text" class="auth_input">
                    <input type="text" class="auth_input">
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h6 class="text-danger">Don't close your browser..</h6>
                    </div>
                </div>
            </div>
            <!-- reg info ends here  -->
            <div class="btncont">
                <p class="text-danger text-center error_text"></p>
                <input id="register" type="submit" class="btn_submit" value="Continue"> 
            </div>
             <div class="row mt-3">
                <div class="col text-center">
                    <p>Didn't receive Email? <span class="text-warning h6">Resend mail</span> </p>
                </div>
             </div>
            <br>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="password_auth.js"></script>

</body>

</html>