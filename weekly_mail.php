<?php
require 'mail.php';
include 'dbconfig.php';

$date = date('d-m-Y');
$date= strtotime($date);

$prev_date = strtotime("-1 week");

$news_sql="SELECT news.title title, news.link link,news.image image,news.description description,news.category category,news.pubdate publication_date,count(likes.news_id) total_likes FROM news, likes WHERE likes.news_id = news.news_id and date > $prev_date and date <= $date  GROUP BY likes.news_id order by likes.news_id desc limit 1;";
$news_query=mysql_query($news_sql);
$news="";
$user_sql="select * from users where status='1';";
$user_query=mysql_query($user_sql);
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php
			
			    $head='<center><h3>Tech News of the Week</h3></center><br>';
			   
				while($users = mysql_fetch_assoc($user_query)) 
				{
					mysql_data_seek($news_query, 0);
					while($rsnews=mysql_fetch_assoc($news_query))
					{
 						$news.='<div style="padding-left:10px; padding-right:10px;"><div style="margin-bottom: 20px;background-color: #fff;border: 1px solid transparent; border-radius: 4px; border-color: #FFD34E;"><div style=" padding: 10px 15px; border-bottom: 1px solid transparent;   border-top-left-radius: 3px;border-top-right-radius: 3px;color: #fff;background-color: #FFD34E;border-color: #FFD34E;"><b><a style="color:black;" href="'.$rsnews['link'].'">'.$rsnews['title'].'</a></b></div><p style="float:right; padding-right:20px;"><font color=#FFD34E><b>Date of publication :</font>'.date("d-m-y",$rsnews['publication_date']).'</b></p><div style="padding: 15px;"><img src="'.$rsnews['image'].'"><p><h4>'.$rsnews['description'].'</h4></p><br><p><h3 >Total likes :'.$rsnews['total_likes'].'</h3></p><br></div></div></div>';
					}
					$news=$head.$news;
					echo $news;
					$mail->Subject = 'NEWS-OF-THE-WEEK';
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
		?>
		
	</body>
</html>	