<?php

require 'vendor/autoload.php';

$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"] ? $_POST["name"] : 'Someone';
	$email = $_POST["email"];
	$message = $_POST["message"] ? $_POST["message"] : 'I have nothing to say.';
}

if (!empty($email)) {

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';

	$mail->Host = "email-smtp.us-west-2.amazonaws.com";
	$mail->SMTPAuth = true;                           // SMTP password
	$mail->SMTPSecure = 'tls';
	$mail->Port = 25;
	$mail->Username = "AKIAJFEWYA7WAKH4E5VQ";
	$mail->Password = "ArbsQxgZMFtPKIeewX/q6VLkasG8MqVgcLmUlHcGaEzJ";

	$mail->From = 'mailer@foursails.co';
	$mail->FromName = 'Foursails Website Mailer';
	$mail->addAddress('matt.davis@foursails.co', 'Matt Davis');
	$mail->addAddress('jason.borger@foursails.co', 'Jason Borger');
	$mail->addReplyTo($email, $name);

	$mail->Subject = 'New contact request from ' . $name;
	$mail->Body = $message;

	$mail->send();
}

?>