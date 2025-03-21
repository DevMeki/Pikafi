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
    #TaskCont {
        background-color: #5382AD;
    }

    #TaskLogo {
        width: 40px;
        height: 40px;
    }

    #CoinInTask {
        width: 15px;
        height: 15px;
    }

    body {
        background-color: #E5EFEE;
    }
    #Task_cont{
       background-color:  #aff9c7;
    }

    #Task_start_btn,
    #Task_claim_btn{
        background-color: #edfff8;
        color: #102830;
        font-size: 15px;
        font-weight: bold;
    }

    #Task_start_btn:hover,
    #Task_claim_btn:hover{
        background-color:  #fff0b5;
        color: #102830;
    }
    </style>
</head>

<body class="container">

    <?php include "header.html"; ?>
    <!-- task nav starts here -->
    <div class="container-fluid">
        <div class="border-0 p-1 rounded text-center fw-bold fs-4" id="Task_cont">
            <p>Get Coins by completing simple tasks</p>

            <div class="row">
                <div class="col-md">
                    <!-- task starts her -->
                    <div class="row border rounded m-1" id="TaskCont">
                        <!-- task image or logo starts here  -->
                        <div class="col-2 mb-2 mt-2">
                            <i class="bi bi-telegram" id="TaskLogo"></i>
                        </div>
                        <!-- ask image or logo ends here  -->

                        <!-- task details starts here -->
                        <div class="col-6 text-light fs-6 fw-semibold text-start">
                            <div id="CoinReward">
                                <img src="assets/images/coin.png" id=CoinInTask>
                                500
                            </div>
                            <div>
                                Join our Telegram cahnnel
                            </div>
                        </div>
                        <!-- task details e ds here -->

                        <!-- start and claim task button starts here  -->
                        <div class="col-4 mt-1">
                            <div class="row me-1">
                                <div class="col-6">
                                    <button class="border-0 rounded-pill btn" id="Task_start_btn">
                                        Start
                                    </button>
                                </div>

                                <div class="col-6">
                                    <button class="border-0 rounded-pill btn" id="Task_claim_btn">
                                        Claim
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- start and claim task button starts here  -->

                    </div>
                    <!-- task ends here -->
                </div>

                <div class="col-md">
                    <!-- task starts her -->
                    <div class="row border rounded m-1" id="TaskCont">
                        <!-- task image or logo starts here  -->
                        <div class="col-2 mb-2 mt-2">
                            <i class="bi bi-twitter-x" id="TaskLogo"></i>
                        </div>
                        <!-- ask image or logo ends here  -->

                        <!-- task details starts here -->
                        <div class="col-6 text-light fs-6 fw-semibold text-start">
                            <div id="CoinReward">
                                <img src="assets/images/coin.png" id=CoinInTask>
                                500
                            </div>
                            <div>
                                Follow us on Twitter (X)
                            </div>
                        </div>
                        <!-- task details e ds here -->

                        <!-- start and claim task button starts here  -->
                        <div class="col-4 mt-1">
                            <div class="row me-1">
                                <div class="col-6">
                                    <button class="border-0 rounded-pill btn" id="Task_start_btn">
                                        Start
                                    </button>
                                </div>

                                <div class="col-6">
                                    <button class="border-0 rounded-pill btn " id="Task_claim_btn">
                                        Claim
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- start and claim task button starts here  -->

                    </div>
                    <!-- task ends here -->
                </div>
            </div>

        </div>
    </div>
    <!-- task nav ends here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>