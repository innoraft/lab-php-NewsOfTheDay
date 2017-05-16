 <?php  
 //insert.php  
include 'dbconfig.php';
if(isset($_GET['email']))
{
 $randomString=""; 
     				 $email=$_GET['email'];
     				 $s="SELECT email from user where email='$email'";
     				 $q = mysql_query($s,$db);
     				 $res= mysql_num_rows($q);

				     $acceptedDomains = array('innoraft.com');
				     if(in_array(substr($email, strrpos($email, '@') + 1), $acceptedDomains))
				     {		
				     			if($res > 0)
				     			{
				     				echo '<font color="red"><b>Email already registered with us</b></font>';
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
									
									      	$sql = "INSERT INTO user (email,unicode) VALUES ('$email','$randomString')";  
									      	if(mysql_query($sql,$db))  
									      	{  
									           echo '<b>Thank you for subscription</b>'; 
									      	}
						      } 
					 }
					 else {
						       	echo '<font color="red"><b>Your domain is not registered</b></font>';
						   }  
 
}
 ?> 
