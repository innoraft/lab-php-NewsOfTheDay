<!DOCTYPE html>
<html>
<head>
	<title>Tech2Mail</title>
	<link href='//fonts.googleapis.com/css?family=Trade Winds' rel='stylesheet'>
	 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style="background:url(img/4.jpg);background-size:cover;">
     <div style="float:left;font-family: Trade Winds;font-size: 25px;"><a href="#index.html" class="navbar-brand"><h2 style="color:white";>TECH2MAIL</h2></a></div>
	<?php
	header('Pragma: no-cache');
    header('Cache-Control: private, no-cache, no-store, max-age=0, must-revalidate, proxy-revalidate');
	include 'dbconfig.php';
	$news_id=$_GET['newsID'];
	$email=$_GET['email'];
	$unicode=$_GET['unicode'];
	if(isset($news_id) and isset($email) and isset($unicode))
	{

		$q = mysql_query("SELECT user_id from users where email='$email' and unicode='$unicode'");
		$ct1= mysql_num_rows($q);

		$userid = mysql_fetch_assoc($q);
			$usr_id = $userid['user_id'];


		$news_query=mysql_query("SELECT news_id, user_id from likes where news_id = $news_id AND  user_id = $usr_id");
		$count=mysql_fetch_assoc($news_query);
		$get_news_id=$count['news_id'];
		$get_userid=$count['user_id'];

		if($news_id == $get_news_id and $usr_id == $get_userid)
		{
			?>
			<div class="container">
			<div style="position: absolute;left: 50%;top: 30%;transform: translate(-50%, -50%);font-family: Trade Winds;font-size: 25px;color:white;"><h2>You have already liked this news!!!</h2></div>
			</div>
		<?php }
		else
		{
			if($ct1 == 1)
		   {
		   		$date = date('Y-m-d');
		   		$date= strtotime($date);
		   		$sql = mysql_query("INSERT INTO likes (news_id,user_id,date)
			 			VALUES ('".$news_id."','".$usr_id."','".$date."')");
			 			?>
			 		<div class="container">
			 	 <div style="position: absolute;left: 50%;top: 30%;transform: translate(-50%, -50%);font-family: Trade Winds;font-size: 25px;color:white;"><h2>Thank you for liking this news!!!</h2></div>
			 	 	</div>
		<?php    }
		   else
		   {  ?>
		   	<div style="position: absolute;left: 50%;top: 30%;transform: translate(-50%, -50%);font-family: Trade Winds;font-size: 25px;color:white;"><h2>You are unauthorized !!!</h2></div>
		  <?php  }


		}
		
	}
?>
<div style="margin-top:300px;">
<div class="container">
<div class="col-md-12">
                <?php 
                	 $tnews="SELECT * from news where news_id=$news_id";
                        $tnews=mysql_query($tnews); 
                        while($news=mysql_fetch_assoc($tnews)) { ?>
                        <div class="panel panel-warning one-edge-shadow wow fadeInDown delay-05s" style="border: 2px solid #FFD34E;box-shadow: 0 10px 18px -6px black;">
                              <div class="panel-heading" style="background:#FFD34E;"> <?php echo '</b><a style="color:black;font-size:18px;" href="'.$news['link'].'">&nbsp;'.$news['title'].'</a>' ?> </div>
                              <div class="panel-body" style="font-size:17px;">
                              <div class="col-md-4" style="padding-left:0px;padding-top:11px;">
                               <?php echo '<img src="'.$news['image'].'" width=250px; height=150px >'?>
                               </div>
                                <div class="col-md-8" style="font-family: 'Flamenco';">

                                    <?php echo '<b> Category :'.$news['category']. '</b><div style="float:right;font-size :15px;"><b>Publish Date: '.date("d-m-Y",$news['pubdate']).'</b></div><br>'; ?>
                                  
                                    <?php echo '<font color="black">' .$news['description']. '</font>'?>
                                    <br>
                                  

                                <a id="new-board-btn" class="btn btn-success" style="background:#FFD34E; float:right;color:black;border:1px solid #FFD34E; " href="<?php echo $news['link'] ?>" target="_blank">Read More</a>
                                 <a id="new-board-btn" class="btn btn-success" style="background:#FFD34E;color:black;float:right;border:1px solid #FFD34E;margin-right: 5px; " href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $news['link'] ?>" target="_blank">Share on Facebook</a>
                               </div>  

                			</div>
            </div>
            <?php } ?>

                </div>
</div>
</div>
 <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>

