<?php
//start session
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
    $new_password = $_POST["password"];
    $confirm_password = $_POST["confirm"];

    if(empty($new_password)){
        $output = json_encode(array('status' => 'error', 'message' => 'Password is empty try again..'));
        die($output);
    }else{
        if(empty($confirm_password)){
            //return error message
            $output = json_encode(array('status' => 'error', 'message' => 'Confirm password is empty try again....'));
            die($output);
        }else{
            if($new_password !== $confirm_password){
                //return error message
                $output = json_encode(array('status' => 'error', 'message' => 'Password does not match try again....'));
                die($output);
            }else{
                //hash the password
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                //get the email from the session
                $email = $_SESSION['email'];
                //update the user password
                $update_password = "UPDATE `users` SET password = '$new_password' WHERE email = '$email'";
                $query = mysqli_query($conn, $update_password);
                if(!$query){
                    //return error message
                    $output = json_encode(array('status' => 'error', 'message' => 'An error occured try again....'));
                    die($output);
                }else{
                    //return success message
                    $output = json_encode(array('status' => 'success', 'message' => 'Password updated successfully....'));
                    die($output);
                }
            }
        }
    }
}
