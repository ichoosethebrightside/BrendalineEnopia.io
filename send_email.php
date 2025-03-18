<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If using Composer
// require 'PHPMailer/PHPMailer.php'; // If using manual download
// require 'PHPMailer/SMTP.php';
// require 'PHPMailer/Exception.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change for other providers
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Your Gmail
        $mail->Password = 'your-app-password'; // Use an App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        // Email Content
        $mail->setFrom('your-email@gmail.com', 'Your Name');
        $mail->addAddress('your-email@gmail.com'); // Where to send the email
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "<strong>Name:</strong> $name <br><strong>Email:</strong> $email <br><strong>Message:</strong> $message";
        
        $mail->send();
        echo 'Success';
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
} else {
    echo '405 Method Not Allowed';
}
