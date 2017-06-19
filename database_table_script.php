<?php
/*..............DATABASE CONNECTION AND DATABASE CREDENTIALS ...*/ 
	include 'global_variable.php';
	$db = mysql_connect($servername,$username,$password);
	if (!$db) {
	die("Connection failed: " . mysql_error());
	}
//.......CREATE DATABASE tech_mail........
	$create_database = mysql_query("CREATE DATABASE ".$database_name." ;");
	mysql_select_db($database_name,$db);
	if($create_database == TRUE)
	{
		echo "DATABSE CREATED";
	}
//................ USER TABLE.................
	$create_table_user = mysql_query("CREATE TABLE IF NOT EXISTS `users` (`user_id` int(255) NOT NULL AUTO_INCREMENT,`email` varchar(700) NOT NULL,`unicode` varchar(700) NOT NULL,`status` int(11) NOT NULL DEFAULT '1',PRIMARY KEY (`user_id`,`email`,`unicode`))");
	if($create_table_user == TRUE)
	{
		echo " User table is created";
	}
	else
	{
		echo "ERROR in user table";
	}
//.................. NEWS TABLE,........................
	$create_table_news = mysql_query("CREATE TABLE IF NOT EXISTS `news` (
		`news_id` int(50) NOT NULL AUTO_INCREMENT,
  `guid` int(60) NOT NULL,
  `title` varchar(700) NOT NULL,
  `link` varchar(700) NOT NULL,
  `image` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(700) NOT NULL,
  `pubdate` int(20) NOT NULL,
  `sent_status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_id`),
  UNIQUE KEY `guid` (`guid`))");
	if($create_table_news == TRUE)
	{
		echo " News table is created";
	}
	else
	{
		echo "ERROR in News table";
	}
	//...........................LIKES TABLE.......................
	$create_table_likes = mysql_query("CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(50) NOT NULL AUTO_INCREMENT,
  `news_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `date` int(20) NOT NULL,
  PRIMARY KEY (`like_id`),
  FOREIGN KEY (news_id) REFERENCES news(news_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
)");
	if($create_table_likes == TRUE)
	{
		echo " Likes table is created";
	}
	else
	{
		echo "ERROR in likes table";
	}
	//.............................admin table...............................
	$create_table_admin = mysql_query("CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` int(20) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`)
)");
	if($create_table_admin == TRUE)
	{
		echo " admin table is created";
	}
	else
	{
		echo "ERROR in admin table";
	}
	$sql = mysql_query("INSERT INTO admin (name,email,password,date)
			 			VALUES ('Rudranil','rudranil.sarkar@innoraft.com','0192023a7bbd73250516f069df18b500', 1497465000)");

?>