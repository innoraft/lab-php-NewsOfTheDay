<!DOCTYPE html>
<?php include '../dbconfig.php'; ?> 
<html lang="en">
<head>
  <title>Tech2Mail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../img/5.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<style>
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 400px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.division
{
  box-shadow: 0 10px 24px rgba(0,0,0,0.20), 0 11px 10px rgba(0,0,0,0.15);
}
.navbar
{
  border-radius: 0px;
}

</style>
<?php
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["email"]))
{
  header("location:index.php");
} 
?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../index.php">TECH2MAIL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
       <li class="active"><a href="admin.php">Home</a></li>
       <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["username"];?></a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  <div class="container">
  <div class="col-md-2">
    
   <div class="division" style="border:2px solid #e2e1e0;height:200px; width:200px;background-color:#e2e1e0; ">
      <?php  
        $query = "SELECT count(*) total_news from news";  
        $result = mysql_query($query);
         $row = mysql_fetch_array($result);
         echo '<center style="font-size:80px;"><span style="border-bottom:4px solid #f4511e;">'.$row['total_news'].'</span><br></center><center style="font-size:20px;">Total News</center>';
      ?>
  </div>
  
  
   <div class="division" style="border:2px solid #e2e1e0;height:200px; width:200px;background-color:#e2e1e0;margin-top:130px;">
     <?php  
        $query = "SELECT count(*) total_users from users";  
        $result = mysql_query($query);
         $row = mysql_fetch_array($result);
         echo '<center style="font-size:80px;"><span style="border-bottom:4px solid #f4511e;">'.$row['total_users'].'</span><br></center><center style="font-size:20px;">Total Users</center>';
      ?>
  </div>

   </div>
  <div class="col-md-8">
    <center style="padding-top:10px;">
      <?php if($_SESSION["email"] == "rudranil.sarkar@innoraft.com") 
      { ?>
      <a href="addadmin.php"><button class="button"><span>ADD ADMIN</span></button></a>
       <a href="showadmin.php"><button class="button"><span>SHOW ADMIN</span></button></a>
    <a href="analytics.php"><button class="button"><span>ANALYTICS</span></button></a>
    <a href="usertable.php"><button class="button"><span>USER TABLE</span></button></a>
    <a href="shownews.php"><button class="button"><span>NEWS ARCHIVE</span></button></a>
    <button class="button" data-toggle="modal" data-target="#myModal"><span>DELETE ALL</span></button>
      <?php
      }
        else { ?>

    <a href="showadmin.php"><button class="button"><span>SHOW ADMIN</span></button></a>
    <a href="analytics.php"><button class="button"><span>ANALYTICS</span></button></a>
    <a href="usertable.php"><button class="button"><span>USER TABLE</span></button></a>
    <a href="shownews.php"><button class="button"><span>NEWS ARCHIVE</span></button></a>
    <button class="button" data-toggle="modal" data-target="#myModal"><span>DELETE ALL</span></button>
                
       <?php   }  ?>
   
    </center>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#f4511e;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;">RESET PORTAL</h4>
        </div>
        <div class="modal-body">
          <p><h3 style="color:red;"><img src="img/danger.gif" width=100px height=100px>Reset Portal!! Are You Sure?</h3></p>
        </div>
        <div class="modal-footer" style="background-color:#f4511e;">
          <form method="POST" action="delete.php">
          <input type="submit" name="extract" style="background-color: #ffffff; color:black;" class="btn btn-danger" value="Delete All">
        </form>
        </div>
      </div>
    </div>
  </div>
<div class="col-md-2">
   <div class="division" style="border:2px solid #e2e1e0;height:200px; width:200px;background-color:#e2e1e0;">
     <?php  
        $query = "SELECT count(DISTINCT category) total_category from news";  
        $result = mysql_query($query);
         $row = mysql_fetch_array($result);
         echo '<center style="font-size:80px;"><span style="border-bottom:4px solid #f4511e;">'.$row['total_category'].'</span><br></center><center style="font-size:20px;">Total News Categories</center>';
      ?>
  </div>
  
   <div class="division" style="border:2px solid #e2e1e0;height:200px; width:200px;background-color:#e2e1e0;margin-top:130px; ">
    <?php  
        $query = "SELECT count(*) total_likes from likes";  
        $result = mysql_query($query);
         $row = mysql_fetch_array($result);
         echo '<center style="font-size:80px;"><span style="border-bottom:4px solid #f4511e;">'.$row['total_likes'].'</span><br></center><center style="font-size:20px;">Total News Liked</center>';
      ?>
  </div>
  </div>
</div>
</body>
</html>
