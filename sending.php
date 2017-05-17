<?php
require 'mail.php';
include 'dbconfig.php';
include 'global_variable.php';
$news_sql="select * from news where sent_status='no' and day != '' order by pubdate desc";
$news_query=mysql_query($news_sql);
$news="";
$user_sql="select * from user where status='active';";
$user_query=mysql_query($user_sql);

?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php
			
			    $head='<center><h3>Todays Tech News</h3></center><br>';
			   
				while($users = mysql_fetch_assoc($user_query)) 
				{
					mysql_data_seek($news_query, 0);
					while($rsnews=mysql_fetch_assoc($news_query))
					{

 						$news.='<div style="padding-left:10px; padding-right:10px;"><div style="margin-bottom: 20px;background-color: #fff;border: 1px solid transparent; border-radius: 4px; border-color: #337ab7;"><div style=" padding: 10px 15px; border-bottom: 1px solid transparent;   border-top-left-radius: 3px;border-top-right-radius: 3px;color: #fff;background-color: #337ab7;border-color: #337ab7;"><b><a style="color:black;" href="'.$rsnews['link'].'">'.$rsnews['title'].'</a></b></div><p style="float:right; padding-right:20px;"><font color=#337ab7><b>Date of publication :</font>'.$rsnews['pubdate'].'</b></p><div style="padding: 15px;"><img src="https:'.$rsnews['image'].'"><p>'.$rsnews['description'].'</p><br><p><a href="'.$_SERVER['SERVER_NAME'].'/like.php?newsID='.$rsnews['news_id'].'&email='.$users['email'].'&unicode='.$users['unicode'].'">LIKE</a></p></div></div></div>';


					}
						$unsubscribe='<a href="'.$_SERVER['SERVER_NAME'].'/del.php?id='.$users['unicode'].'">Unsubscribe</a>';


					$news=$head.$news.$unsubscribe;

					echo $news;
				 	$mail->Subject = 'news';
				 	$mail->Body    = $news;
				    

				 	$mail->addAddress($users['email']);       
				 	$mail->isHTML(true);                               
				 	if(!$mail->send()) {
				 	    echo 'Message could not be sent.';
				 	    echo 'Mailer Error: ' . $mail->ErrorInfo;
				 	} else {
				 	    echo 'Message has been sent'.$users['email'].'<br>';
				 	}
					
				 $mail->clearAddresses();

				$news="";
				}
				$update_sql="update news set sent_status='yes'";
				 mysql_query($update_sql);

		?>
		
	</body>
</html>	
