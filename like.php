<html>
<head>
	<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>

	
<body style="background:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url(img/9.jpeg);background-repeat: no-repeat;background-position: center;overflow: hidden;background-size: cover;">	
<?php
	$ct=0;
	$ct1=0;
	$usr_id=0;
	include 'dbconfig.php';
	$news_id=$_GET['newsID'];
	$email=$_GET['email'];
	$unicode=$_GET['unicode'];
	if(isset($news_id) and isset($email) and isset($unicode))
	{
		$q = mysql_query("SELECT user_id from user where email='$email' and unicode='$unicode'");
		$ct1= mysql_num_rows($q);
		
			$userid = mysql_fetch_assoc($q);
			$usr_id = $userid['user_id'];

		$news_query=mysql_query("SELECT news_id, user_id from likes where news_id = $news_id AND  user_id = $usr_id");
		$count=mysql_fetch_assoc($news_query);
		$get_news_id=$count['news_id'];
		$get_userid=$count['user_id'];
		if($news_id == $get_news_id and $usr_id == $get_userid)
		{?>
		   <div style="font-family: 'Sofia';font-size: 50px;color:white; text-align:center;transform: translate(-50%, -50%);
  left: 50%; top: 50%;position: absolute;">
			<?php echo '<h1>You already liked this post!!!<h1>'; ?>
		   </div>
		<?php }		
		else
		{
		  if($ct1 == 1)
		   {

		   	$dat = date("Y-m-d");
		   	$time = date('H:i:s');
			$sql = mysql_query("INSERT INTO likes (news_id,user_id,date_time,time)
			 			VALUES ('".$news_id."','".$usr_id."','".$dat."','".$time."')");
			$up=mysql_query("UPDATE news set total_like=total_like+1 where news_id='$news_id'");
			?>
			 <div style="font-family: 'Sofia';font-size: 50px;color:white; text-align:center;transform: translate(-50%, -50%);
  left: 50%; top: 50%;position: absolute;">
			<?php echo '<h1>Thank you for liking this post!!!<h1>'; ?>
			</div>
			<?php
			}
			else
			{ ?>
				<div style="font-family:'Sofia';font-size: 50px;color:white; text-align:center;transform: translate(-50%, -50%);
  left: 50%; top: 50%;position: absolute;"><?php echo'<h1>You are unauthorized</h1>'?></div>
				
			<?php }
		}

	}
?>
</body>
</html>