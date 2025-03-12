<?php
// Start the session
session_start();

//connect to database
include "databaseConnection.php";

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

    if(empty($auth_code)){
        $output = json_encode(array('status' => 'error', 'message' => 'Invalid code try again..'));
        die($output);
    }else{
        
    }
}
