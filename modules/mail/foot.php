<?php 
        $mail->AltBody = "DINAS SOSIAL P3AP2KB KABUPATEN BANJAR"; //body email (optional)
 
	if(!$mail->send()) 
	{
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	    echo "Message has been sent successfully";
	}
 ?>