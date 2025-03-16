<?php
    //connect to database
    include "../../databaseConnection.php";

    //get users email from link parameter
    // $token = $_GET["token"];

    // Check if the parameter exists in the URL and if it's not empty
    if (isset($_GET['token']) && !empty($_GET['token'])) {
        // The parameter is not empty
        $parameterValue = $_GET['token'];

        // Check if the parameter is a valid email
        if (filter_var($parameterValue, FILTER_VALIDATE_EMAIL)) {
            // The parameter is a valid email
            // Check if the email exists in the database
            $fetchUser = "SELECT * FROM `users` WHERE userToken = '$parameterValue'";
            $query = mysqli_query($conn, $fetchUser);
            if (!$query) {
                //redirect to email status page
                header("location: status.php?status=servererror");
            } else {
                if (mysqli_num_rows($query) < 1) {
                    //redirect to email status page
                    header("location: status.php?status=notfound");
                } else {
                    $dataAsArray = mysqli_fetch_assoc($query);
                    //verify if the user is verified
                    if ($dataAsArray["verifyKey"] !== "") {
                        //redirect to email error page
                        header("location: status.php?status=alreadyverified");
                    } else {
                        //generate 10 random characters
                        $verifyKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
                        //update the user verifyKey to an empty string
                        $updateUser = "UPDATE `users` SET verifyKey = '$verifyKey' WHERE userToken = '$parameterValue'";
                        $query = mysqli_query($conn, $updateUser);
                        if (!$query) {
                            //redirect to email status page
                            header("location: status.php?status=servererror");
                        } else {
                            //redirect to email verified page
                            header("location: verified.php?status=verified");
                        }
                    }
                }
            }
        } else {
            //redirect to email status page
            header("location: status.php?status=invalidemail");
        }
    } else {
        //redirect to login page
        header("location: ../../login.php");
    }
