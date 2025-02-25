<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $q1 = $_POST["q1"];
//     $q2 = $_POST["q2"];
//     $q3 = $_POST["q3"];
//     $q4 = $_POST["q4"];
    
//     $to = "isaacverbrugge@gmail.com";
//     $subject = "New Contact Form Message";
//     $body = "Name: $name\nEmail: $email\n\nq1:\n$q1\n\nq2:\n$q2\n\nq3:\n$q3\n\nq4:\n$q4";
//     $headers = "From: $email";
    
//     if (mail($to, $subject, $body, $headers)) {
//         echo "Message sent successfully!";
//     } else {
//         echo "Error sending message.";
//     }
// }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@gmail.com';
    $mail->Password = 'your-email-password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('from-email@example.com', 'Mailer');
    $mail->addAddress('recipient@example.com', 'Joe User');
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
