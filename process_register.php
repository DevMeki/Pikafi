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
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    //validate users input
    if (empty($email)) {
        //return an error message
        $output = json_encode(array('status' => 'error', 'message' => 'Email is empty'));
        die($output);
    } else {
        if (empty($username)) {
            //return an error message
            $output = json_encode(array('status' => 'error', 'message' => 'Username is empty'));
            die($output);
        } else {
            if (empty($password)) {
                //return an error message
                $output = json_encode(array('status' => 'error', 'message' => 'Password is empty'));
                die($output);
            } else {
                if (empty($confirm_password)) {
                    //return an error message
                    $output = json_encode(array('status' => 'error', 'message' => 'Confirm password is empty'));
                    die($output);
                } else {
                    if ($confirm_password !== $password) {
                        //return an error message
                        $output = json_encode(array('status' => 'error', 'message' => 'password does not match'));
                        die($output);
                    } else {
                        //verify user email
                        $email_DB = "SELECT * FROM users WHERE email = '$email'";
                        $email_Data = mysqli_query($conn, $email_DB);
                        if (!$email_Data) {
                            //return an error message
                            $output = json_encode(array('status' => 'error', 'message' => 'An error occured in the server.'));
                            die($output);
                        } else {
                            if (mysqli_fetch_assoc($email_Data) > 0) {
                                //return an info message
                                $output = json_encode(array('status' => 'info', 'message' => 'This email has already been used.'));
                                die($output);
                            } else {
                                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                                // $WithdrawalPINHash = hash('md5', $WithdrawalPIN);
                                $token = bin2hex(random_bytes(16)); //generates a crypto-secure 32 characters long
                                $user_refCode = substr(preg_replace('/\W/', "", base64_encode(bin2hex(random_bytes(32)))), 0, 15);
                                $userRefCode6 = substr($user_refCode, 0, 6);
                                $regDate = date("Y-m-d h:i:sa");
                                $insertData = "INSERT INTO users (email, username, password, userToken, balance, refCode, verifyKey, dateTime, auth) VALUES ('$email', '$username', '$passwordHash', '$token', '0', '$userRefCode6', '', '$regDate', 'user')";
                                $query = mysqli_query($conn, $insertData);
                                if ($query) {

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
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                                        //Recipients
                                        $mail->setFrom('picanki.tech.hub@gmail.com', 'Pikafi');
                                        $mail->addAddress($email, $username);     //Add a recipient
                                        $mail->addReplyTo('picanki.tech.hub@gmail.com', 'Pikafi Support');
                                        $mail->addCC('picanki.tech.hub@gmail.com');

                                        //Content
                                        $mail->isHTML(true);                        //Set email format to HTML
                                        $mail->Subject = 'Password Reset Request';
                                        // Pass the "code" parameter to verifyemailLink.php
                                        $emailContent = file_get_contents("http://localhost/pikafi/email/email.php?token=" . urlencode($token));
                                        $mail->msgHTML($emailContent, __DIR__);
                                        // $mail->Body    = 'Hello user';
                                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                        if ($mail->send()) {
                                            // return success message
                                            $output = json_encode(array('status' => 'success', 'message' => 'Verification link has been sent to your email.'));
                                            die($output);
                                        } else {
                                            $output = json_encode(array('status' => 'info', 'message' => 'Mail failed, Network error try again..'));
                                            die($output);
                                        }
                                    } catch (Exception $e) {
                                        // $error =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                        $output = json_encode(array('status' => 'error', 'message' => $mail->ErrorInfo));
                                        die($output);
                                    }
                                } else {
                                    //return an error message
                                    $output = json_encode(array('status' => 'error', 'message' => 'failed to upload user details'));
                                    die($output);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
