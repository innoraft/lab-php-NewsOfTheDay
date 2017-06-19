<?php
/*.....MYSQL PHP DATABASE CONNECTION..... DATABASE NAME :- tech_mail... */
include 'global_variable.php';
 $db = mysql_connect($servername,$username,$password);
 mysql_select_db($database_name,$db);
 if (!$db) {
    die("Connection failed: " . mysql_error());
}
?>