<?php

// In the new PHPMailer v6.0+, you will now need to import the PHPMailer classes
// into the global namespace at the very top of your PHP script.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'koneksi.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

if (isset($_POST['go'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$verification_key = md5($email);

	$query = "INSERT INTO users (email,password,verification_key) VALUES ('$email','$password','$verification_key')";
	$result = mysql_query($query);
	if ($result) {
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = 'Your email address';
		$mail->Password = 'Your password';
		$mail->setFrom('Your email address', 'Your name');
		$mail->addAddress($email, 'Anonymous');
		$mail->Subject = 'Verify Your Account !';
		$mail->Body = 'Testing send email with PHPMailer...';


		// This code works if you cannot connect to the SMTP host, this is only an optional.
		$mail->SMTPOptions = array(
			'ssl' => array(
		    'verify_peer' => false,
		    'verify_peer_name' => false,
		    'allow_self_signed' => true
			)
		);

		if (!$mail->send()) {
			echo "Mailer Error : " .$mail->ErrorInfo;
		} else {
			echo '<p style="background: green; color: white;">User Registration successfull. Please Check your email to activate your account</p>';
		}
	} else {
		echo "User registration failed !";
	}
}

?>