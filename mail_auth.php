<?php
    $name = "Arun Teja";
    $email = "aruntejamenda@gmail.com";
    $subject = "MAIL TRAIL";
    $message = "MAIL TRAIL";
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail -> SMTPDebug = SMTP::DEBUG_SERVER;
    $mail -> isSMTP();
    $mail -> SMTPAuth = true;
    $mail -> Host = "smtp.example.com";
    $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail -> Port =587;
    $mail -> Username = "aruntejamenda@gmail.com";
    $mail -> Password = "@#%+53tedFyy";
    // $mail -> setForm ($email, $name);
    $mail -> addAddress("n180574@rguktn.ac.in","N180574");
    $mail -> Subject = $subject;
    $mail -> Body = $message;
    $mail -> send();
    echo "email sent";
?>  