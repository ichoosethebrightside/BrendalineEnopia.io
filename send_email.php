<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Check for empty fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Recipient email address
    $to = 'your-email@example.com'; // Replace with your email address
    $subject = 'Contact Form Submission';

    // Create email content
    $email_body = "Name: $name\r\n";
    $email_body .= "Email: $email\r\n";
    $email_body .= "Message:\r\n$message\r\n";

    // Email headers
    $headers = "From: no-reply@example.com\r\n"; // Use a fixed sender domain
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "There was a problem sending your message.";
    }
} else {
    echo "Invalid request method.";
}
?>

