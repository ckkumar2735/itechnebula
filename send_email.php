<?php
require 'vendor/autoload.php'; // Path to Composer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $service = $_POST["service"];
    $message = $_POST["message"];
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@itechnebula.com';
        $mail->Password = 'Unknown@1';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        
        $mail->setFrom('contact@itechnebula.com', 'From www.itechnebula.com');
        $mail->addAddress('itechnebula@gmail.com');
        
        $mail->isHTML(true);


        $mail->Subject = 'iTechNebula enquiry - From: ' . $name;
        $mail->Body = "Name: $name\nEmail: $email\nMobile: $mobile\nService: $service\nMessage:\n$message";
        
        $mail->send();
        echo 'Message sent!';
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
