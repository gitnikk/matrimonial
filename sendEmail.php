<?php
// die("Here");
mb_internal_encoding("UTF-8");

$to = 'sampleinfo@gmail.com';
$subject = 'Message from Cryptex';

$name = "";
$email = "";
$phone = "";
$message = "";

if( isset($_POST['name']) ){
    $name = $_POST['name'];

    $body .= "Name: ";
    $body .= $name;
    $body .= "\n\n";
}
if( isset($_POST['subject']) ){
    $subject = $_POST['subject'];
}
if( isset($_POST['email']) ){
    $email = $_POST['email'];

    $body .= "";
    $body .= "Email: ";
    $body .= $email;
    $body .= "\n\n";
}
if( isset($_POST['phone']) ){
    $phone = $_POST['phone'];

    $body .= "";
    $body .= "Phone: ";
    $body .= $phone;
    $body .= "\n\n";
}
if( isset($_POST['message']) ){
    $message = $_POST['message'];

    $body .= "";
    $body .= "Message: ";
    $body .= $message;
    $body .= "\n\n";
}

$headers = 'From: ' .$email . "\r\n";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    mb_send_mail($to, $subject, $body, $headers);
    header("Location:mailSent.php?status=success");
}
else{
    header("Location:mailSent.php?status=error");
}
