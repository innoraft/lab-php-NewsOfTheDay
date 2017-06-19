<?php
//login.php
session_start();
include "../dbconfig.php";
if(isset($_POST["username"]) && isset($_POST["password"]))
{
 $username = mysql_real_escape_string($_POST["username"]);
 $password = md5(mysql_real_escape_string($_POST["password"]));
 $sql = "SELECT * FROM admin WHERE email = '".$username."' AND password = '".$password."'";
 $result = mysql_query($sql);
 $num_row = mysql_num_rows($result);
 if($num_row > 0)
 {
  $data = mysql_fetch_array($result);
  $_SESSION["username"] = $data["name"];
  $_SESSION["email"] = $data["email"];
  echo $data["name"];
 }
}
?>