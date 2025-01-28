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
        $username = $_POST["userName"];
        $password = $_POST["password"];

        if (empty($username)) {
            // echo "username is empty";
            $output = json_encode(array('status' => 'error', 'message' => 'username is empty'));
            die($output);
        }else{
            if (empty($password)) {
                // echo "phone is empty";
                $output = json_encode(array('status' => 'error', 'message' => 'password is empty'));
                die($output);
            }else{
                $fetchUser = "SELECT * FROM users WHERE Username = '$username'";
                $query = mysqli_query($conn, $fetchUser);
                if (!$query) {
                    $output = json_encode(array('status' => 'error', 'message' => 'User does not exist.'));
                    die($output);
                }else {
                    $dataAsArray = mysqli_fetch_assoc($query);
                    $verifyPassword = password_verify($password, $dataAsArray["Password"]);
                    if ($verifyPassword) {
                        if ($dataAsArray["Auth"] == "user") {
                            $_SESSION['username'] = $username;
                            $_SESSION['userToken'] = $dataAsArray["userToken"];
                            $_SESSION['Auth'] = $dataAsArray["Auth"];
                            $_SESSION['UserInvitationCode'] = $dataAsArray["InvitationCode"];
                            $output = json_encode(array('status' => 'success', 'message' => 'success'));
                            die($output);
                        }else if($dataAsArray["Auth"] == "subadmin"){
                            //subadmin
                            $_SESSION['username'] = $username;
                            $_SESSION['userToken'] = $dataAsArray["userToken"];
                            $_SESSION['Auth'] = $dataAsArray["Auth"];
                            $_SESSION['UserInvitationCode'] = $dataAsArray["InvitationCode"];
                            $output = json_encode(array('status' => 'successAuth', 'message' => 'success'));
                            die($output);
                        }else{
                            $_SESSION['username'] = $username;
                            $_SESSION['userToken'] = $dataAsArray["userToken"];
                            $_SESSION['Auth'] = $dataAsArray["Auth"];
                            $_SESSION['UserInvitationCode'] = $dataAsArray["InvitationCode"];
                            $output = json_encode(array('status' => 'successAuth', 'message' => 'success'));
                            die($output);
                        }
                    }else{
                        $output = json_encode(array('status' => 'error', 'message' => 'Incorrect username or password'));
                        die($output);
                    }
                }
            }
        }

    }
?>