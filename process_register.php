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
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    //validate users input
    if (empty($email)) {
        //return an error message
        $output = json_encode(array('status' => 'error', 'message' => 'Email is empty'));
        die($output);
    } else {
        if (empty($username)) {
            //return an error message
            $output = json_encode(array('status' => 'error', 'message' => 'Username is empty'));
            die($output);
        } else {
            if (empty($password)) {
                //return an error message
                $output = json_encode(array('status' => 'error', 'message' => 'Password is empty'));
                die($output);
            } else {
                if (empty($confirm_password)) {
                    //return an error message
                    $output = json_encode(array('status' => 'error', 'message' => 'Confirm password is empty'));
                    die($output);
                } else {
                    if ($confirm_password !== $password) {
                        //return an error message
                        $output = json_encode(array('status' => 'error', 'message' => 'password does not match'));
                        die($output);
                    } else {
                        //verify user email
                        $email_DB = "SELECT * FROM users WHERE email = '$email'";
                        $email_Data = mysqli_query($conn, $email_DB);
                        if (!$email_Data) {
                            //return an error message
                            $output = json_encode(array('status' => 'error', 'message' => 'An error occured in the server.'));
                            die($output);
                        } else {
                            if (mysqli_fetch_assoc($email_Data) > 0) {
                                //return an info message
                                $output = json_encode(array('status' => 'info', 'message' => 'This email has already been used.'));
                                die($output);
                            } else {
                                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                                // $WithdrawalPINHash = hash('md5', $WithdrawalPIN);
                                $token = bin2hex(random_bytes(16)); //generates a crypto-secure 32 characters long
                                $user_refCode = substr(preg_replace('/\W/', "", base64_encode(bin2hex(random_bytes(32)))), 0, 15);
                                $userRefCode6 = substr($user_refCode, 0, 6);
                                $regDate = date("Y-m-d h:i:sa");
                                $insertData = "INSERT INTO users (email, username, password, userToken, balance, refCode, verifyKey, dateTime, auth) VALUES ('$email', '$username', '$passwordHash', '$token', '0', '$userRefCode6', '', '$regDate', 'user')";
                                $query = mysqli_query($conn, $insertData);
                                if ($query) {
                                    //login user auto
                                    // $_SESSION['username'] = $username;
                                    // $_SESSION['userToken'] = $token;
                                    // $_SESSION['auth'] = "user";
                                    // $_SESSION['userRefCode'] = $userRefCode6;
                                    //return success message
                                    $output = json_encode(array('status' => 'success', 'message' => 'Account Created Successfully..'));
                                    die($output);
                                } else {
                                    //return an error message
                                    $output = json_encode(array('status' => 'error', 'message' => 'failed to upload user details'));
                                    die($output);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
