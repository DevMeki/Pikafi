<?php
//start a session
session_start();

include "../../databaseConnection.php";

//get user token
$token = $_SESSION["userToken"];

$db = "SELECT * FROM `users` WHERE userToken = '$token'";
$result = mysqli_query($conn, $db);

if($result){
    if(mysqli_num_rows($result) > 0){
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);    
        // Return the data as JSON
        header('Content-Type: application/json');
        echo json_encode($user);
    }else{
        // Return the data as JSON
        header('Content-Type: application/json');
        echo json_encode(['error' => 'User not found']);
    }
}else{
    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Network error']);
}

