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
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
        //return an error message
        $output = json_encode(array('status' => 'error', 'message' => 'Email is empty'));
        die($output);
    } else {
        if (empty($password)) {
            //return an error message
            $output = json_encode(array('status' => 'error', 'message' => 'Password is empty'));
            die($output);
        } else {
            $fetchUser = "SELECT * FROM `users` WHERE email = '$email'";
            $query = mysqli_query($conn, $fetchUser);
            if (!$query) {
                //return an error message
                $output = json_encode(array('status' => 'error', 'message' => 'An error occured....'));
                die($output);
            } else {
                if (mysqli_num_rows($query) < 1) {
                    //return an error message
                    $output = json_encode(array('status' => 'error', 'message' => 'This user does not exist.'));
                    die($output);
                } else {
                    $dataAsArray = mysqli_fetch_assoc($query);
                    //verify if the user is verified
                    if ($dataAsArray["verifyKey"] === "") {
                        //return an info message
                        $output = json_encode(array('status' => 'info', 'message' => 'Please verify your email address.'));
                        die($output);
                    } else {
                        $verifyPassword = password_verify($password, $dataAsArray["password"]);
                        if ($verifyPassword) {
                            if ($dataAsArray["auth"] === "user") {
                                $_SESSION['userToken'] = $dataAsArray["userToken"];
                                $_SESSION['username'] = $dataAsArray["username"];
                                $_SESSION['email'] = $dataAsArray["email"];
                                $_SESSION['auth'] = $dataAsArray["auth"];

                                //return an success message
                                $output = json_encode(array('status' => 'success', 'message' => 'success'));
                                die($output);
                            } else {
                                //return an info message
                                $output = json_encode(array('status' => 'info', 'message' => 'Users allowed only..'));
                                die($output);
                            }
                        } else {
                            //return an info message
                            $output = json_encode(array('status' => 'info', 'message' => 'Incorrect email or password'));
                            die($output);
                        }
                    }
                }
            }
        }
    }
}
