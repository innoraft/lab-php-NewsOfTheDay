<?php
/*..............DATABASE CONNECTION AND DATABASE CREDENTIALS ...*/ 
	include 'global_variable.php';
	$db = mysql_connect($servername,$username,$password);
	if (!$db) {
	die("Connection failed: " . mysql_error());
	}


//.......CREATE DATABASE tech_mail........

	$create_database = mysql_query("CREATE DATABASE tech_mail;");
	mysql_select_db($database_name,$db);
	if($create_database == TRUE)
	{
		echo "DATABSE CREATED";
	}

//................ USER TABLE.................
	$create_table_user = mysql_query("CREATE TABLE IF NOT EXISTS `user` (`user_id` int(255) NOT NULL AUTO_INCREMENT,`email` varchar(700) NOT NULL,`unicode` varchar(700) NOT NULL,`status` varchar(50) NOT NULL DEFAULT 'active',PRIMARY KEY (`user_id`,`email`,`unicode`))");
	if($create_table_user == TRUE)
	{
		echo " User table is created";
	}
	else
	{
		echo "ERROR in user table";
	}
//.................. NEWS TABLE,........................
	$create_table_news = mysql_query("CREATE TABLE IF NOT EXISTS `news` (`news_id` int(200) NOT NULL AUTO_INCREMENT,`title` varchar(700) NOT NULL,`link` text NOT NULL,`image` text NOT NULL,`description` text NOT NULL,`pubdate` varchar(30) NOT NULL,`total_like` int(100) NOT NULL DEFAULT '0',`day` varchar(100) NOT NULL,`sent_status` varchar(100) NOT NULL DEFAULT 'no',PRIMARY KEY (`news_id`),UNIQUE KEY `title` (`title`))");
	if($create_table_news == TRUE)
	{
		echo " News table is created";
	}
	else
	{
		echo "ERROR in News table";
	}
	//...........................LIKES TABLE.......................
	$create_table_likes = mysql_query("CREATE TABLE IF NOT EXISTS `likes` (`like_id` int(50) NOT NULL AUTO_INCREMENT,`news_id` int(50) NOT NULL,`user_id` int(50) NOT NULL,`date_time` date NOT NULL,`time` time NOT NULL, PRIMARY KEY (`like_id`),FOREIGN KEY (news_id) REFERENCES news(news_id),FOREIGN KEY (user_id) REFERENCES user(user_id))");
	if($create_table_likes == TRUE)
	{
		echo " Likes table is created";
	}
	else
	{
		echo "ERROR in likes table";
	}
	
?>