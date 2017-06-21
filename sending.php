<?php
require 'mail.php';
include 'dbconfig.php';
$news_sql = "select * from news where sent_status= 0 order by pubdate desc";
$news_query=mysql_query($news_sql);
$total_count = mysql_num_rows($news_query);
$news="";
$user_sql = "select * from users where status = 1 ";
$user_query = mysql_query($user_sql);

?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php
			  if($total_count > 0)
			  {
			    $head='<center><h3>Todays Tech News</h3></center><br>';
			   
				while($users = mysql_fetch_assoc($user_query)) 
				{
					mysql_data_seek($news_query, 0);
					while($rsnews=mysql_fetch_assoc($news_query))
					{
						$date = date("d-m-Y",$rsnews['pubdate']);
 						$news.='<div style="padding-left:10px; padding-right:10px;"><div style="margin-bottom: 20px;background-color: #fff;border: 1px solid transparent; border-radius: 4px; border-color: #FFD34E;"><div style=" padding: 10px 15px; border-bottom: 1px solid transparent;   border-top-left-radius: 3px;border-top-right-radius: 3px;color: #fff;background-color: #FFD34E;border-color: #FFD34E;"><b><a style="color:black;" href="'.$rsnews['link'].'">'.$rsnews['title'].'</a></b></div><p style="float:right; padding-right:20px;"><font color=#FFD34E><b>Date of publication :</font>'.$date.'</b></p><div style="padding: 15px;"><img src="'.$rsnews['image'].'"width=250px; height=150px ><p>'.$rsnews['description'].'</p><br><p><a href="'.$_SERVER['SERVER_NAME'].'/like.php?newsID='.$rsnews['news_id'].'&email='.$users['email'].'&unicode='.$users['unicode'].'">LIKE</a></p></p></div></div></div>';
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
				$update_sql="update news set sent_status='1'";
				 mysql_query($update_sql);
			}
		?>
		
	</body>
</html>	