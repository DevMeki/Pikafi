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

    #listItem {
        background-color: #5382AD;
    }
    </style>
</head>

<body class="container">

    <?php include "header.html"; ?>

    <div class="card m-1">
        <div class="card-body">
            <!-- <h5 class="card-title text-center">User Profile</h5> -->
            <img src="images/logo.png" id="UserDp" class="mx-auto d-block w-25 h-25">
            <ul id="UserInfo" class="list-group list-group-flush">
                <li id="UserName" class="list-group-item">
                    <i class="bi bi-person-circle"></i> Username:
                </li>
                <li id="Email" class="list-group-item">
                    <i class="bi bi-envelope-at-fill"></i> Email:
                </li>
                <li class="list-group-item" id="Wallet">
                    <i class="bi bi-wallet2"></i> Wallet:
                </li>
                <li class="list-group-item">
                    <button class="border-0 bg-white w-100 text-start" data-bs-toggle="modal"
                        data-bs-target="#AccountSetting" type="button">
                        <i class="bi bi-gear-fill"></i> Account Setting
                    </button>
                </li>
                <!-- <li class="list-group-item"></li>
                <li class="list-group-item"></li> -->
            </ul>
        </div>
    </div>

    <!-- account setting modal box strts here -->
    <div id="AccountSetting" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalCont">
                <div class="modal-header">
                    <h3 class="fw-bold ms-2 mt-2">Account Setting</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <!-- modal header ends here  -->

                <!-- modal body starts here  -->
                <div class="modal-body bg-light">
                    <ul class="list-group list-group-flush text-start fw-semibold">
                        <li class="list-group-item border rounded-2" id="listItem">
                        <p class="text-light">Add Your Wallet Address</p>
                            Enter your BEP20 address from a non-custodial wallet such as Metamask, Trust Wallet, or
                            similar.
                            <input type="text" placeholder="BEP20 or EVM address"
                                class="border-0 w-100 mt-1 border ps-2 rounded-2">
                        </li>
                        <li class="list-group-item mt-2 border rounded-2" id="listItem">
                            <p class="text-light">Update Your Profile Picture</p>
                            <label for="imageUpload">Select an image:</label>
                            <input type="file" id="imageUpload" name="image-upload" accept="image/*">

                        </li>
                    </ul>

                    <button
                        class="mx-auto d-block m-3 border-2 rounded-pill pe-5 ps-5 p-2 btn btn-outline-success fw-semibold"
                        id="Account-Submit-Btn">
                        Submit
                    </button>
                </div>

                <!-- modal body ends here -->
            </div>
        </div>
    </div>
    <!-- account setting modal box ends here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>