<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path as needed

function sendWelcomeEmail($to, $name) {
    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    try {
        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'saheedsuleiman46@gmail.com';            // Your Gmail address
        $mail->Password = 'rtku aesm qksa haxk';              // Your Gmail password or app password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption
        $mail->Port = 465;                                   // TCP port to connect to

        // Recipients
        $mail->setFrom('saheedsuleiman46@gmail.com', 'GPAtalentsHunts'); // Your name
        $mail->addAddress($to, $name);                       // Add a recipient (user's email)

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Welcome to GPAtalentsHunts!';
        $mail->Body    = "Hi $name,<br><br>Thank you for signing up! We are excited to have you on board.";

        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        return false; // Email could not be sent
    }
}
