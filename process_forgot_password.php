<?php
// Start the session
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


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
    $code = $_POST["code"];

    if (empty($email)) {
        $output = json_encode(array('status' => 'error', 'message' => 'Email is invalid try again..'));
        die($output);
    } else {
        $db = "SELECT * FROM `users` WHERE email = '$email' ";
        $query = mysqli_query($conn, $db);
        if ($query) {
            $result = mysqli_num_rows($query);
            if ($result < 1) {
                $output = json_encode(array('status' => 'error', 'message' => 'User not found on the system..'));
                die($output);
            } else {
                $data = mysqli_fetch_assoc($query);
                $username = $data["username"];

                //Load Composer's autoloader
                require 'vendor/autoload.php';

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'picanki.tech.hub@gmail.com';                     //SMTP username
                    $mail->Password   = 'nqezeexyjakftqqp';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('picanki.tech.hub@gmail.com', 'Apextradenetwork');
                    $mail->addAddress($email, $username);     //Add a recipient
                    $mail->addReplyTo('picanki.tech.hub@gmail.com', 'Pikafi Support');
                    $mail->addCC('picanki.tech.hub@gmail.com');

                    //Content
                    $mail->isHTML(true);                        //Set email format to HTML
                    $mail->Subject = 'Pikafi Verification Email Code';
                    // $mail->msgHTML(file_get_contents("verifyemailLink.php"), __DIR__);
                    // $mail->Body    = '';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if($mail->send()){
                        // return success message
                        $output = json_encode(array('status' => 'success', 'message' => 'Network error try again..'));
                        die($output);
                    }else{
                        $output = json_encode(array('status' => 'info', 'message' => 'Mail failed, Network error try again..'));
                        die($output);
                    }
                } catch (Exception $e) {
                    // $error =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    $output = json_encode(array('status' => 'error', 'message' => $mail->ErrorInfo ));
                    die($output);
                }

            }
        } else {
            $output = json_encode(array('status' => 'error', 'message' => 'Network error try again..'));
            die($output);
        }
    }
}
