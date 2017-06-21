<?php  
 //insert.php  
//if(isset($_GET['email']))
//<?php  
 //insert.php  
include 'dbconfig.php';
if(isset($_POST['email']))
{
 $randomString=""; 
     				 $email=$_POST['email'];
     				 $s="SELECT * from users where email='$email'";
     				 $q = mysql_query($s,$db);
     				 $registration_data=mysql_fetch_assoc($q);
     				 $res= mysql_num_rows($q);


				     			if($res > 0)
				     			{
				     				if($registration_data['status'] == 0)
				     				{
				     					$sql="UPDATE users set status = 1 where email = '$email'";
				     					 $sql = mysql_query($sql,$db);
				     					 echo '<b>Thank you for subscribed again!!!</b>'; 
				     				}
				     				else
				     				{
				     					echo '<font color="red"><b>Email already registered with us</b></font>';
				     				}
				     			}
				     			else
				     			{
				     				
												$length = 10; 
											    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
											    $charactersLength = strlen($characters);			   
											    for ($i = 0; $i < $length; $i++) 
											    {
											        $randomString .= $characters[rand(0, $charactersLength - 1)];
											    }
									
									      	$sql = "INSERT INTO users (email,unicode) VALUES ('$email','$randomString')";  
									      	if(mysql_query($sql,$db))  
									      	{  
									           echo '<b>Thank you for subscription</b>'; 
									      	}
						      } 
					 
 
}
 ?> 