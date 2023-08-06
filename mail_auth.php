<?php

    // PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception;
    // Base files 
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    // create object of PHPMailer class with boolean parameter which sets/unsets exception.
    $mail = new PHPMailer(true);                              
    try {
        $mail->isSMTP(); // using SMTP protocol                                     
        $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
        $mail->SMTPAuth = true;  // enable smtp authentication                             
        $mail->Username = 'n180574@rguktn.ac.in';  // sender gmail host              
        $mail->Password = '@#%+53tedFyy'; // sender gmail host password                          
        $mail->SMTPSecure = 'tls';  // for encrypted connection                           
        $mail->Port = 587;   // port for SMTP     

        $mail->setFrom('n180574@rguktn.ac.in', "Sender"); // sender's email and name
        $mail->addAddress('aruntejamenda@gmail.com', "Receiver");  // receiver's email and name

        $mail->Subject = 'Test subject';
        $mail->Body    = 'Test body';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) { // handle error.
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>  