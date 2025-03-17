<?php 
    //include auth.php file on all secure pages
    include "auth/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mining page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #E5EFEE;
        }
        #Main_cont{
            background-color: #edfff8;
        }
        #FriendCont{
            background-color:  #5382AD;
        }
        #CLaimInviteBtn{
            background-color: #00d47e;
        }

        #CLaimInviteBtn:hover{
            background-color: #fff0b5;
        }
    </style>
</head>

<body class="container">

    <?php include "header.html"; ?>

    <!-- friends main container starts hre  -->
    <div class="container-fluid fw-bold fs-4 text-center mt-2">
            Bring your friends on board and receive 10% of their mining earnings.

        <div class="border-0 p-1 rounded mt-3" id="Main_cont">

            <!-- copy invite link starts her -->
            <div>
                <p id="InviteLink" class="fw-semibold">Link text here</p>
                <button class="mx-auto d-block m-3 border-2 rounded-pill pe-5 ps-5 p-2 btn btn-outline-success fw-semibold" type="button">Copy Link</button>
            </div>
            <!-- copy invite link ends here  -->

            <!-- claim friends reward starts here -->
             <hr>
             <div class="mt-3 mb-3">
                <button class="border-0 rounded-pill pe-4 ps-4 p-2 fw-semibold fs-6" id="CLaimInviteBtn">Claim</button>
                <img src="assets/images/logo.png" class="mb-2">
                <span id="UnclaimedBalance" class="fs-4 text-dark">5345.56</span>
             </div>
             <hr>
             <!-- claim friends reward ends here  -->

            <!-- invited friends starts here -->
             <div class="row text-light m-2">
                <div class="col-md border rounded-2 m-1" id="FriendCont">
                    <span class="me-5" id="FriendUsername">Friend's Username</span>
                    <span id="unclaimedReward" class="ms-5">345.56</span>
                </div>
                
                <div class="col-md border rounded-2 m-1 " id="FriendCont">
                    <span class="me-5" id="FriendUsername">Friend's Username</span>
                    <span id="unclaimedReward" class="ms-5">345.56</span>
                </div>
             </div>
             <!-- invited friends ends here -->
        </div>
    </div>
    <!-- friends main container ends here  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>