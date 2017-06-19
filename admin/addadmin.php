<!DOCTYPE html>
<html lang="en">
<head>
  <title>TECH2MAIL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/signup-form.css" type="text/css" />
    <link rel="stylesheet" href="style.css">
</head>
<style type="text/css">
.navbar
{
  border-radius: 0px;
}
</style>
<body style="background:url(img/2.jpg);background-size:cover;">
<?php
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["email"]))
{
  header("location:index.php");
}
if($_SESSION["email"] != "rudranil.sarkar@innoraft.com")
{
 header("location:admin.php"); 
}
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">TECH2MAIL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
       <li><a href="admin.php">Home</a></li>
       <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["username"];?></a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<body style="background-color:#e2e1e0">

  <div class="container">

    <div class="signup-form-container">
    
         <!-- form start -->
         <form method="POST" role="form" id="register-form" autocomplete="off" action="submit.php">
         
         <div class="form-header">
          <h3 class="form-title"><i class="fa fa-user"></i> Sign Up</h3>
                      
         <div class="pull-right">
             <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
         </div>
                      
         </div>
                  
         <div class="form-body">
                      
            <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                   <input name="name" type="text" class="form-control" id="name" placeholder="Username">
                   </div>
                   <span class="help-block" id="error"></span>
              </div>
                        
              <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                   <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                   </div> 
                   <span class="help-block" id="error"></span>        
              </div>    
              <div class="row">
                        
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                        </div>  
                        <span class="help-block" id="error"></span>

                   </div>
                            
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="cpassword" type="password" id="cpassword" class="form-control" placeholder="Retype Password">
                        </div>  
                        <span class="help-block" id="error"></span>           
                   </div>
                           
             </div>
                        
                        
            </div>
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info" id="submit">
                 <span class="glyphicon glyphicon-log-in"></span> Sign Me Up !
                 </button>
                    <span class="help-block" id="success_message"></span>
                    <?php 
                          echo '<h3 style="color:red;">'.$_SESSION['msg'].'</h3>';
                          unset($_SESSION['msg']); 
                      ?>
            </div>
            </form>
           </div>

  </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery-1.11.2.min.js"></script>
   <script src="assets/jquery.validate.min.js"></script>
    <script src="assets/register.js"></script>

</body>