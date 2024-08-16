<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "modules/mail/library/PHPMailer.php";
require_once "modules/mail/library/Exception.php";
require_once "modules/mail/library/OAuth.php";
require_once "modules/mail/library/POP3.php";
require_once "modules/mail/library/SMTP.php";
 
	$mail = new PHPMailer;
    
	//Enable SMTP debugging. 
	$mail->SMTPDebug = 3;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "mail.platformumkm.id"; //host mail server
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password               
    $ggmail = "slrt-dinsos@platformumkm.id";     
	$mail->Username = $ggmail;   //nama-email smtp          
	$mail->Password = "IkiNOOB2024";           //password email smtp
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "ssl";                           
	//Set TCP port to connect to 
	$mail->Port = 465;                    
	$mail->From = $ggmail; //email pengirim
	$mail->FromName = "ADMIN SLRT DINAS SOSIAL P3AP2KB KABUPATEN BANJAR"; //nama pengirim


 ?>