<?php
require 'vendor/autoload.php';

use SendGrid\Mail\Mail;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $email = new Mail();
    $email->setFrom("your-email@example.com", "Your Name");
    $email->setSubject($subject);
    $email->addTo("chjack568@gmail.com", "Recipient Name");
    $email->addContent("text/plain", "Name: $name\nEmail: $email\n\n$message");

    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

    try {
        $response = $sendgrid->send($email);
        
        echo 'Email sent successfully.';
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
}
else {
    echo 'Invalid request method.';
}
?>