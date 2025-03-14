<?php
//start session
session_start();

//connect to database
// include "databaseConnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //exit script outputting json data
    $output = json_encode(
        array(
            'status' => 'error',
            'message' => 'failed'
        )
    );
    // die($output);

    //get users input
    $auth_code = $_POST["code"];

    $auth_code = htmlspecialchars($auth_code);

    if(empty($auth_code)){
        $output = json_encode(array('status' => 'error', 'message' => 'Invalid code {empty} try again..'));
        die($output);
    }else{
        $val_code = $_SESSION['verificationCode'];
        if(intval($auth_code) !== intval($val_code)){
            //return error message
            $output = json_encode(array('status' => 'error', 'message' => 'Invalid code try again....'));
            die($output);
        }else{
            // Delete the session variable
            unset($_SESSION['verificationCode']);
            //return success message
            $output = json_encode(array('status' => 'success', 'message' => 'valid authentication code...'));
            die($output);
        }
    }
}
