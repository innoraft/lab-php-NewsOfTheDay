<!DOCTYPE html>
<?php include '../dbconfig.php'; ?> 
<html lang="en">
<head>
  <title> Tech2Mail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
.navbar{
  border-radius: 0px;
}
 #box
  {
   width:100%;
   max-width:500px;
   border:1px solid #ccc;
   border-radius:5px;
   margin:0 auto;
   padding:0 20px;
   box-sizing:border-box;
   height:170px;
   box-shadow: 0 10px 24px rgba(0,0,0,0.20), 0 11px 10px rgba(0,0,0,0.15);
   background-color:white; 
  }
</style>
<body style="background:url(img/2.jpg); background-size:cover;">
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
       <li ><a href="index.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
   <h2 align="center">Forget Password</h2><br /><br />
   <div id="box">
    <br />
    <form method="post" id="form_id">
     <div class="form-group">
      <label>Enter Email</label>
      <input type="email" name="email" id="email" class="form-control" />
     </div>
     <div class="form-group">
      <input type="button" name="login" id="submit" class="btn btn-success" value="Forget Password" />
     </div>
     <div id="error"></div>
    </form>
    <br />
   </div>
  </div>

</body>

<script>
     $(document).ready(function(){  
      $('#submit').click(function(){  
           var email = $('#email').val(); 
            var allowedDomains = [ 'innoraft.com' ]; 
            var domain = $("#email").val().split("@")[1]; 
           if(email == '')  
           {  
                $('#error').html("<h4 style='color:red;'>Required All Fields value</h4>");  
           }
          else 
          { 
            if($.inArray(domain, allowedDomains) !== -1)
              {         
                $('#error').html('');  
                $.ajax({  
                     url:"forgetpassword.php",  
                     type:"POST",  
                     data:{email:email},
                     success:function(data){
                           $('#error').html(data);
                           $('#form_id').trigger("reset");  
                     }  
                });  
              }
                else
                {
                  $('#error').html("<h4 style='color:red;'>Unauthorized Domain name</h4>");  
                }
         }

      });  
 });  
  </script>
</html>
