<html>
<head>
	<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body style="background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url(img/9.jpeg);background-repeat: no-repeat;background-position: center;overflow: hidden;background-size: cover;">	
<?php
// REMOVE USER FROM SERVICE.....
include 'dbconfig.php';
$id=$_GET['id'];
$sql = mysql_query("UPDATE  user set status='inactive' where  unicode='$id'");
?>
<div style="font-family: 'Sofia';font-size: 50px;color:white; text-align:center;transform: translate(-50%, -50%);
  left: 50%; top: 50%;position: absolute;">
<?php echo 'You are unsubscribed from this service!!!'; ?>
</div>
</body>
</html>