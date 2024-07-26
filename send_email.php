<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieve form fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // set recipient address
    $to = "chjack568@gmail.com";

    // set email subject
    $email_subject = "new message from: $name - $subject";

    // set email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    // email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // send composed email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    }
    else {
        echo "Failed to send message.";
    }
}
?>