<html>
<head>
	<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body style="background-color:#194E6E;;background-repeat: no-repeat;background-position: center;overflow: hidden;background-size: cover;">	
<?php
// REMOVE USER FROM SERVICE.....
include 'dbconfig.php';
if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql = mysql_query("UPDATE  users set status = 0 where  unicode='$id'");
  ?>
<div style="font-family: 'Sofia';font-size: 50px;color:white; text-align:center;transform: translate(-50%, -50%);
  left: 50%; top: 50%;position: absolute;">
<?php echo 'You are unsubscribed from Tech2Mail service!!!'; } ?>
</div>
</body>
</html>