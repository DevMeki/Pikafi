<?php 
    //include auth.php file on all secure pages
    include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset account password Page</title>
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

        .formcont>input {
            padding-bottom: 3%;
            padding-top: 3%;
            margin-top: 3%;
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

        .btncont>a>input {
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
                <label for="emmail">Create a new password.</label>
                <input type="password" id="password" placeholder="Enter New Password....">
                <input type="password" id="confirm" placeholder="Confirm Password....">
            </div>
            <!-- reg info ends here  -->

            <!-- button starts here -->
            <div class="btncont">
                <p class="text-center text-danger error"></p>
                <a> <input id="resetBtn" type="submit" value="Submit"> </a>
            </div>
            <!-- button ends here -->
            <br>
            <br>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="set_new_password.js"></script>
</body>
</html>