<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/PHPMailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'daizusoya5@gmail.com';                 // SMTP username
        $mail->Password   = 'pvld vnxo ukww wkgt';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
        $mail->Port       = 587;                                    // TCP port to connect to

        // Disable SSL certificate verification (for local development only)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom($_POST["email"], $_POST["name"]);            // Use email and name from form
        $mail->addAddress('daizusoya5@gmail.com');                  // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $_POST["subject"];                         // Use subject from form
        $mail->Body    = "Name: {$_POST['name']}<br>Email: {$_POST['email']}<br>Contact Number: {$_POST['phoneno']}<br>Message: " . nl2br($_POST["message"]);  // Use message from form

        $mail->send();
        echo "<script>alert('Sent Successfully'); window.location.href='contact.html';</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
