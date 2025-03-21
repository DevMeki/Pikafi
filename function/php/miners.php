<?php
//start session
session_start();

//connect to database
include "../../databaseConnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //exit script outputting json data
    $output = json_encode(
        array(
            'status' => 'error',
            'message' => 'failed'
        )
    );
    // die($output);

    $miner = $_POST["miner"];
    $token = $_SESSION["userToken"];

    //get the current date
    $dateTime = date("d-m-y h:i:sa");


    //get users coinPH
    $db_CPH = "SELECT coinPH FROM `users` WHERE userToken = '$token'";
    $result_CPH = mysqli_query($conn, $db_CPH);
    $data = mysqli_fetch_assoc($result_CPH);
    //convert to integer
    $user_coinPH = (float)$data["coinPH"];

    //check if the user has miner already
    $db_miner = "SELECT * FROM `$miner` WHERE userToken = '$token'";
    $result_miner = mysqli_query($conn, $db_miner);
    if ($result_miner) {
        //fetch user miner details
        $data_arr = mysqli_fetch_assoc($result_miner);
        $data = mysqli_num_rows($result_miner);
        if ($data > 0) {
            //get user miner details
            $amount = intval($data_arr["amount"]);
            $level = intval($data_arr["level"]);
            //converting the string to a float
            $coinPH = (float)$data_arr["coinPH"];
            //increase by 100%
            $amount *= 2;
            $coinPH *= 2;
            $level += 1;
            //format to 3 decimal places
            $coinPH = number_format($coinPH, 3);
            //update user miner
            $db_update = "UPDATE `$miner` SET level = '$level', coinPH = '$coinPH', amount = '$amount' WHERE userToken = '$token'";
            if (mysqli_query($conn, $db_update)) {     
                $coinPH += $user_coinPH;           
                //update user data
                $db_inner_1 = "UPDATE `users` SET coinPH = '$coinPH' WHERE userToken = '$token'";
                if(mysqli_query($conn, $db_inner_1)){
                    //return success message
                    $output = json_encode(array('status' => 'success', 'message' => 'Miner upgraded..'));
                    die($output);
                }
            } else {
                //return error message
                $output = json_encode(array('status' => 'error', 'message' => 'An error occured try again....'));
                die($output);
            }
        } else {
            //check miner
            $name = $coinPH = $amount = "";
            if ($miner == "miner1") {
                $name = "Tech";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner2") {
                $name = "Tech";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner3") {
                $name = "Telecom";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner4") {
                $name = "Crypto";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner5") {
                $name = "Tech";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner6") {
                $name = "Tech";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner7") {
                $name = "Tech";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner8") {
                $name = "Tech";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner9") {
                $name = "Tech";
                $coinPH = "0.023";
                $amount = "1000";
            } else if ($miner == "miner10") {
                $name = "Tech";
                $coinPH = "0.023";
                $amount = "1000";
            }
            //update the miner table
            $db = "INSERT INTO `$miner` (name, level, coinPH, amount, userToken, datetime) VALUES ('$name', '1', '$coinPH', '$amount', '$token', '$dateTime')";
            $result = mysqli_query($conn, $db);
            if ($result) {
                //add up
                $coinPH += $user_coinPH;
                //update user data
                $db_inner = "UPDATE `users` SET coinPH = '$coinPH' WHERE userToken = '$token'";
                if (mysqli_query($conn, $db_inner)) {
                    //return success message
                    $output = json_encode(array('status' => 'success', 'message' => 'Miner Activated'));
                    die($output);
                } else {
                    //return error message
                    $output = json_encode(array('status' => 'error', 'message' => 'An error occured try again....'));
                    die($output);
                }
            } else {
                //return error message
                $output = json_encode(array('status' => 'error', 'message' => 'An error occured try again....'));
                die($output);
            }
        }
    } else {
        //return error message
        $output = json_encode(array('status' => 'error', 'message' => 'An error occured 1 try again....'));
        die($output);
    }
}
