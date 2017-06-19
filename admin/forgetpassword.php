<?php
include '../dbconfig.php';
include '../mail.php';
if(isset($_POST['email']))
{
	$email = $_POST['email'];
	$query=mysql_query("SELECT password,email FROM admin WHERE email = '$email'");
	$s = mysql_num_rows($query);
	if($s == 0)
	{
		echo'<h4 style="color:red">Email not found!!</h4>';
	}
	else
	{
		$row = mysql_fetch_assoc($query);
		$password = $row['password'];
			$admin='<h1>Tech2Mail</h1><br><h1>Your password reset link given below</h1><br><a href="'.$_SERVER['SERVER_NAME'].'/admin/restpassword.php?authcode='.$password.'&email='.$row['email'].'">Click here to reset Password</a>';


				 	$mail->Subject = 'Tech2Mail';
				 	$mail->Body    = $admin;
				    
				 	$mail->addAddress($email);       
				 	$mail->isHTML(true);                               
				 	if(!$mail->send()) {
				 	   // echo 'Message could not be sent.';
				 	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
				 	} else {
				 	    //echo 'Message has been sent'.$email.'<br>';
				 	}
					
				 $mail->clearAddresses();
				 echo "<h4 style='color:green;'>Password link send to your email</h4>";
	}
}
?>
