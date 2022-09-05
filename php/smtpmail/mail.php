<?php
if (!isset($_SESSION)) {
    session_start();
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($remail, $reset_token)
{

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


    $mail = new PHPMailer(true);

    try {


        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ajayhestabit162@gmail.com';
        $mail->Password   = 'rhssuvcwbtuqvjoc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;


        $mail->setFrom('ajayhestabit162@gmail.com', 'Ajay');

        $mail->addAddress($remail);


        $mail->isHTML(true);
        $mail->Subject = 'Password Reset ';
        $mail->Body    = "This is the HTML message body <b><a href='http://tse.hestalabs.com/Mailman_Project/mailman/forget_Password.php?reset_token=$reset_token'> Reset password</a></b>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
$con = new  mysqli("localhost", "tse", "0wi&lbRuPuv", "Ajay");

if (isset($_POST['send'])) {
    $remail = $_POST['remail'];

    $query = "SELECT * FROM `Register_tb`where `recovery_email`='$remail'";
    //echo $query;
    //die();
    $result = mysqli_query($con, $query);

    if ($result) {

        if (mysqli_num_rows($result) == 1) {

            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date = date("Y-m-d");
            $query = "UPDATE `Register_tb` SET `reset_token`='$reset_token',`reset_date`=' $date'  WHERE `recovery_email`='$remail'";
            if (mysqli_query($con, $query) && sendMail($remail, $reset_token)) {

                $_SESSION['status'] = " Please check your email";
                header("Location:../../mailman/index.php");
            }
        } else {
            $_SESSION['name'] = " Please correct email id";
            header("Location:../../mailman/send_email.php");
        }
    } else {
        echo "not";
    }
}