<?php
    //start session
    session_start();

    //destroy session
    $logout = session_destroy();
    if($logout){
        //redirect to login page
        header("Location: ../login.php");
    }