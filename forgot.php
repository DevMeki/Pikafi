<?php 
    //include auth.php file on all secure pages
    include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotten password Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body{
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

        #name{
            padding-top: 15%;
        }

        /* form starts here */
        .formcont {
            padding: 10%;
        }

        /* .formcont>input {
            padding-bottom: 3%;
            padding-top: 3%;
            margin-top: 3%;
            width: 100%;
            border: none;
            border-bottom: 1px solid #49688D;
            background: none;
        } */

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
                <b>Hey!,</b>
                <label for="email">Forgot your password?</label>
                <input type="email" id="email" placeholder="Enter Email" class="form-control">
                <!-- <input type="password" placeholder="password"> -->
            </div>
            <!-- reg info ends here  -->

            <!-- button starts here -->
            <div class="btncont">
                <p class="text-danger text-center error_text"></p>
                <input id="register" class="btn_submit" type="submit" value="Submit">
            </div>
            <!-- button ends here -->

            <div class="text-center mt-4 mb-5">
                <a href="Register.php">Don't have an account?</a>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="forgot.js"></script>
</body>

</html>