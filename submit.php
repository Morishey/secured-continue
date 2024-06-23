<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!$email) {
        echo "Invalid email format.";
        exit;
    }

    // Email details
    $to = "jaeger.62frei@gmail.com";
    $subject = "New Form Submission";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Email content
    $body = "You have received a new message from the contact form on your website.\n\n" .
            "Here are the details:\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Message:\n$message";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us. We will get back to you shortly.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>