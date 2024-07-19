<?php
// Get data from form
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$number = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';

// Define recipient email and subject
$to = "akshay.8bittech@gmail.com"; // Replace with your desired recipient email
$subject = "Mail From 8Bit Tech Solutions";

// Create message body with proper formatting
$message = "Name: " . $name . "\r\n" .
           "Email: " . $email . "\r\n" .
           "Mobile Number: " . $number . "\r\n" .
           "Subject: " . $subject;

// Set headers
$headers = "From: 8Bit Tech Solutions";

// Send email only if email address is provided
if ($email != null) {
    mail($to, $subject, $message, $headers);
}

// Redirect to thank you page (optional)
// header("Location: thankyou.html");
?>
