<?php 
include '../dbconfig.php';
include '../mail.php';
session_start();
if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['cpassword']))
{

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['cpassword'];

	 $sql = mysql_query("select * from admin where email='$email'");
	 $s=mysql_num_rows($sql);
	 if($s > 0)
	 {
	 	 $_SESSION['msg']='Email already registered';
	 	 header("location:addadmin.php");
	 }
	 else
	 {
		$date = date('Y-m-d');
    	$date= strtotime($date);

    	$sql = mysql_query("INSERT INTO admin (name,email,password,date)
			 			VALUES ('".$name."','".$email."','".md5($password)."','".$date."')");

    			$admin= 'You are the Tech2Mail admin, Your email is: '.$email.'<br> Password:'.$password;


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
				header("location:showadmin.php");


     }
}
?>