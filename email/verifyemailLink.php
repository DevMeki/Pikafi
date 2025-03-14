<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #151d27;
            /* color: #151d27; */
        }

        #main {
            background-image: url("https://i.ibb.co/B5tpZBpx/reg-log-Bg.png");
            background-size: cover;
        }

        img {
            width: 110px;
            height: auto;
        }

        h1 {
            color: #49688D;
        }

        #name {
            padding-top: 15%;
            text-align: center;
        }

        /* form starts here */
        .formcont {
            padding: 10%;
        }
    </style>
</head>

<body class="container pt-md-0">
    <div class="row">
        <div class="col-0 col-md-4"></div>
        <div class="col-0 col-md-4 pt-5 pb-5" id="main">
            <!-- logo image strts here  -->
            <div id="logocont">
                <div style="text-align: center;">
                    <img src="https://i.ibb.co/bZhKYNq/logo.png" alt="logo" border="0">
                </div>
            </div>
            <!-- logo ends here -->

            <!-- name starts here  -->
            <div id="name" class="text-center">
                <h3>Verify Your Identity</h3>
            </div>
            <!-- name ends here  -->

            <!-- reg info starts here  -->
            <div class="formcont">
                <p style="color: #151d27;">
                    <b>Hey!,</b>
                    Dear,<br> <br>
                    We received a request to reset the password for your <b>PIKAFI</b> account. To proceed, please use the verification code below to verify your identity:
                    <br>
                    <?php
                    if (isset($_GET['code']) && $_GET['code'] !== '') {
                        echo "<b style='color: #151d27;'>Verification  Code: " . $_GET['code'] . "</b>";
                    }
                    ?>
                </p>
                <p style="color: #151d27;">
                    <strong>Need help?</strong> Visit our [Help Center] or reply to this email, and we’ll be happy to assist you.
                    <br>
                    Welcome to <strong>PIKAFI</strong> we’re excited to have you on board!
                </p>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

</body>

</html>