<?php
//include auth.php file on all secure pages
include "auth/auth.php";
//import database connection file
include "databaseConnection.php";

$token = $_SESSION["userToken"];

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body,
        #Boost_modal_body {
            background-color: #edfff8;
        }

        #mrimg {
            width: 20px;
            height: 20px;
        }

        #miner,
        #PayBills,
        #Boost_club_btn {
            background-color: #5382AD;
        }

        #BoostBtn:hover {
            background-color: #fff0b5;
        }

        #CalimBtn {
            background-color: #00d47e;
        }

        #CalimBtn:hover,
        #Modal_body {
            background-color: #edfff8;
        }

        #Pikaficont,
        #main_miner_cont {
            background-color: #aff9c7;
        }

        #upgrade,
        #PayBills {
            border: none;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            background-color: #edfff8;
        }


        #upgrade:hover,
        #PayBills:hover {
            background-color: #fff0b5;
        }

        #BillTimer {
            color: #41c1b2;
        }

        #boostCont>button,
        #Club>button,
        #claim,
        #billCont,
        #New_club_btn {
            background-color: #5382AD;
        }

        #Club_dp {
            width: 50px;
            height: 50px;
        }

        #Club_info,
        #Club_Board,
        #Club_info>ul>li {
            background-color: #0d2d52;
        }

        #rocket_icon {
            color: #fff0b5;
        }

        #New_club_btn:hover {
            background-color: #fff0b5;
        }
    </style>
</head>

<body class="container">

    <?php include "header.html"; ?>


    <!-- pikafi balance, mining rate and claim starts here  -->
    <div class="text-center text-dark fw-semibold p-3 rounded-3" id="Pikaficont">
        <div class="">$PKF Balance</div>
        <img src="assets/images/logo.png" class="mb-2">
        <span id="PikafiBalance" class="fs-1">20,222.34</span>
        <div>
            Mining Rate:
            <img src="assets/images/logo.png" class="mb-1 ms-2" id="mrimg">
            <span id="miningrate">0.50/hr</span>
        </div>
        <!-- claim starts here -->
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 m-2">
                <div id="claim" class="border-0 rounded-5">
                    <button id="CalimBtn" class=" border-0 rounded-pill p-2 pe-4 ps-4 fw-bold mt-2">
                        Claim
                    </button>
                    <div>
                        <img src="assets/images/logo.png" class="mb-2">
                        <span id="UnclaimedBalance" class="fs-4 text-light">10,023.56</span>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <!-- claim ends here  -->
    </div>
    <!-- pikafi balance mining rate and claim ends here  -->

    <nav class="navbar nav-fill">
        <!-- boost starts here  -->
        <div id="boostCont" class="fw-bold text-end text-center">
            <button class="border-0 rounded-pill p-1 pe-2 ps-2" data-bs-toggle="modal" data-bs-target="#Boost"
                type="button">
                <i class="bi bi-rocket-takeoff-fill text-light">Boost</i>
            </button>

            <!-- modal box for boost starts here -->
            <div id="Boost" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content" id="modalCont">
                        <div class="modal-header">
                            <!-- <div class="modal-title">
                                <img src="images/coin.png" class="mt-1" id="IngameCoin">
                            </div> -->
                            <h1 class="fw-bold ms-2 mt-2">Boost Your Mining per hour</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        </div>
                        <!-- modal header ends here  -->

                        <!-- modal body starts here  -->

                        <div class="modal-body" id="Boost_modal_body">
                            <p class="text-start">
                            </p>
                            <!-- price options starts here -->
                            <div class="row rounded-3 mt-1 pt-1" id="priceOption">
                                <div class="col-6 text-start">
                                    <span id="BuyAmount" class="fs-6 fw-bold">%10
                                        <img src="assets/images/logo.png" class=""> Boost for 1 day
                                    </span>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="rounded-pill border-0 mb-1" id="BoostBtn">
                                        <img src="assets/images/coin.png" class="mb-1" id="coinimg">
                                        <span id="BoostPrice" class="fs-6 fw-bold">100 </span>
                                    </button>
                                </div>
                            </div>

                            <div class="row rounded-3 mt-1 pt-1" id="priceOption">
                                <div class="col-6 text-start">
                                    <span id="BuyAmount" class="fs-6 fw-bold">%20
                                        <img src="assets/images/logo.png" class=""> Boost for 1 day
                                    </span>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="rounded-pill border-0 mb-1" id="BoostBtn">
                                        <img src="assets/images/coin.png" class="mb-1" id="coinimg">
                                        <span id="BoostPrice" class="fs-6 fw-bold">600 </span>
                                    </button>
                                </div>
                            </div>

                            <div class="row rounded-3 mt-1 pt-1" id="priceOption">
                                <div class="col-6 text-start">
                                    <span id="BuyAmount" class="fs-6 fw-bold">%30
                                        <img src="assets/images/logo.png" class="mb-1"> Boost for 1 day
                                    </span>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="rounded-pill border-0 mb-1" id="BoostBtn">
                                        <img src="assets/images/coin.png" class="mb-1" id="coinimg">
                                        <span id="BoostPrice" class="fs-6 fw-bold">1500 </span>
                                    </button>
                                </div>
                            </div>

                            <div class="row rounded-3 mt-1 pt-1" id="priceOption">
                                <div class="col-6 text-start">
                                    <span id="BuyAmount" class="fs-6 fw-bold">%50
                                        <img src="assets/images/logo.png" class="mb-1"> Boost for 1 day
                                    </span>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="rounded-pill border-0 mb-1" id="BoostBtn">
                                        <img src="assets/images/coin.png" class="mb-1" id="coinimg">
                                        <span id="BoostPrice" class="fs-6 fw-bold">5000 </span>
                                    </button>
                                </div>
                            </div>

                            <!-- special offer starts here -->
                            <div class="text-warning m-2 fs-3">SPecial Offers</div>

                            <div class="row rounded-3 mt-1 pt-1" id="priceOption">
                                <div class="col-6 text-start">
                                    <span id="BuyAmount" class="fs-6 fw-bold">%100
                                        <img src="assets/images/logo.png" class="mb-1"> Boost for 1 day
                                    </span>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="rounded-pill border-0 mb-1" id="BoostBtn">
                                        <img src="assets/images/coin.png" class="mb-1" id="coinimg">
                                        <span id="BoostPrice" class="fs-6 fw-bold">5,900 </span>
                                    </button>
                                </div>
                            </div>
                            <!-- special Offers ends here  -->

                            <!-- price options ends here  -->
                        </div>
                    </div>
                </div>
                <!-- modal box for boost and Allinace ends here -->
            </div>
            <!-- boost ends here  -->
        </div>
        <!-- Club starts here  -->
        <div id="Club" class="fw-bold text-end text-center">
            <button class="border-0 rounded-pill p-1 pe-3 ps-3" data-bs-toggle="modal" data-bs-target="#Club_modal"
                type="button">
                <i class="bi bi-people-fill text-light"> Club</i>
            </button>

            <?php include "club_modal.html"; ?>


            <!-- Club ends here  -->
        </div>
    </nav>


    <!-- active miners starts here -->

    <div class=" p-1 rounded-3 fw-bold mb-5" id="main_miner_cont">
        <!-- utility starts here  -->
        <div class="text-center mb-3">
            Update Your Tax and Utility Bills
            <button id="PayBills" class="rounded-pill text-dark fw-bold border-0" data-bs-toggle="modal" data-bs-target="#BillsModalbox"
                type="button">Here</button>

            <!-- this timer below counts the amount of time left for the tax and utility bills.
            mining stops once it gets to zero  -->
            <div id="BillTimer"> 00:D 03:HR 59:SEC </div>
        </div>
        <!-- utility ends here  -->

        <P class="text-center">Invest In A Business To Start Earning $PKF. 
            Its Advisable To Have Several Investments</P>
        <div class="row text-light mb-2">
            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-2 mt-md-0">
                    <?php 
                        function miner1(){
                            global $conn;
                            global $token;

                            $db = "SELECT * FROM `miner1` WHERE userToken = '$token'";
                            $result = mysqli_query($conn, $db);
                            $data = mysqli_fetch_assoc($result);
                            if(mysqli_num_rows($result) < 1){

                            }else{
                    ?>
                                <div class="col">
                                    <div id="minertype">TECH</div>
                                    <div id="minerUpgradePrice" class="fw-semibold"><?php echo $data["amount"]; ?></div>
                                </div>
                                <div class="col">
                                    <div id="minerRate"><?php echo $data["coinPH"]; ?>/hr</div>
                                    <div id="minerLevel" class="fw-semibold">level <?php echo $data["level"]; ?></div>
                                </div>
                                <div class="col mt-1 mb-1 minerCon">
                                    <input type="text" name="" value="<?php echo $data["level"]; ?>" id="minerLevel" hidden>
                                    <button class="rounded-pill" value="miner1" id="upgrade">Activate</button>
                                </div>                    
                    <?php
                            }
                        }
                        miner1();
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">TECH</div>
                        <div id="minerUpgradePrice" class="fw-semibold">1000</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="miner2" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">Telecom</div>
                        <div id="minerUpgradePrice" class="fw-semibold">500</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="miner3" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">Crypto</div>
                        <div id="minerUpgradePrice" class="fw-semibold">500</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="4" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">Crypto</div>
                        <div id="minerUpgradePrice" class="fw-semibold">500</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="miner5" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">Crypto</div>
                        <div id="minerUpgradePrice" class="fw-semibold">500</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="6" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">Crypto</div>
                        <div id="minerUpgradePrice" class="fw-semibold">500</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="miner7" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">Crypto</div>
                        <div id="minerUpgradePrice" class="fw-semibold">500</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="miner8" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">Crypto</div>
                        <div id="minerUpgradePrice" class="fw-semibold">500</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="miner9" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="miner" class="rounded-2 row m-1 ps-5 pe-3 mt-md-0">
                    <div class="col">
                        <div id="minertype">Crypto</div>
                        <div id="minerUpgradePrice" class="fw-semibold">500</div>
                    </div>
                    <div class="col">
                        <div id="minerRate">0.023/hr</div>
                        <div id="minerLevel" class="fw-semibold">level 0</div>
                    </div>
                    <div class="col mt-1 mb-1">
                        <button class="rounded-pill" value="miner10" id="upgrade">Activate</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- active miners ends here -->

    <!-- modal box for tax and utility bills starts here   -->
    <div id="BillsModalbox" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalCont">
                <div class="modal-header">
                    <h4 class="fw-bold ms-2 mt-2">Renew your Tax and Utility Bills to continue mining</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <!-- modal header ends here  -->

                <!-- modal body starts here  -->
                <div class="modal-body bg-light text-light">
                    <div class="row border-0 rounded-2 p-2 fw-bold mt-2" id="billCont">
                        <div class="col-8">
                            Set up automatic bill renewal for the next 24 hours.
                        </div>
                        <div class="col-4 text-end">
                            <button type="button" class="rounded-pill border-2 mt-2 p-1 pe-2 ps-2" id="BoostBtn">
                                <img src="assets/images/coin.png" class="" id="coinimg">
                                <span id="BoostPrice" class="fs-6 fw-bold">200 </span>
                            </button>
                        </div>
                    </div>

                    <div class="row border-0 rounded-2 p-2 fw-bold mt-2" id="billCont">
                        <div class="col-8">
                            Set up automatic bill renewal for the next 2 days.
                        </div>
                        <div class="col-4 text-end">
                            <button type="button" class="rounded-pill border-2 mt-2 p-1 pe-2 ps-2" id="BoostBtn">
                                <img src="assets/images/coin.png" class="" id="coinimg">
                                <span id="BoostPrice" class="fs-6 fw-bold">2160 </span>
                            </button>
                        </div>
                    </div>

                    <div class="row border-0 rounded-2 p-2 fw-bold mt-2" id="billCont">
                        <div class="col-8">
                            Set up automatic bill renewal for the next 4 days hours.
                        </div>
                        <div class="col-4 text-end">
                            <button class="rounded-pill border-2 mt-2 p-1 pe-2 ps-2" id="BoostBtn">
                                <img src="assets/images/coin.png" class="" id="coinimg">
                                <span id="BoostPrice" class="fs-6 fw-bold">3900 </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- modal body ends here -->
            </div>
        </div>
    </div>
    <!-- modal box for tax and utility bills ends here   -->

    <!-- footer starts here -->


    <!-- footer ends here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="function/user.js"></script>
    <script src="function/miners.js"></script>
</body>

</html>