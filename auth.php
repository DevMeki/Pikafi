<?php
    //start session
    session_start();

    //check if user is logged in
    if (isset($_SESSION['userToken'])) {
        header("Location: Airdrop.php");
    }