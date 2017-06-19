 <!DOCTYPE html>
 <?php include '../dbconfig.php'; ?>  
 <html>  
      <head>  
           <title>Tech2Mail</title>  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      </head>  
      <style type="text/css">
      .table-bordered>tbody>tr>td
      {
        border: 1.5px solid black;
        color:black;
      }
      .table-bordered>tbody>tr>th
      {
        border: 1.5px solid black;
        background-color: #0e1b47;
        color: white;

      }
      table
      {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        background: white;

      }
      .navbar
{
  border-radius: 0px;
}

      </style>
      <?php
session_start();
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
} 
?>
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
       <li class="active"><a href="admin.php">Home</a></li>
       <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["username"];?></a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<h3 align="center">ALL ADMIN</h3><br/>
<?php 
 $query = "SELECT email,unicode,status  from users";  
 $result = mysql_query($query);
 ?> 
           <br /><br />  
           <div class="container">  
                
                <table class='table table-bordered' >  
                <tr>  
                <th>Email</th>  
                <th>Unicode</th>
                <th width='10%'>Status</th>
              <?php  
                  while($row = mysql_fetch_array($result))  
                {   ?>
                        <tr>
                        <td> <?php echo $row['email']; ?> </td>
                        <td> <?php echo $row['unicode']; ?> </td>
                        <?php 
                          if($row['status'] == 0)
                          { ?>
                            <td><?php echo "inactive"; ?></td>
                            <?php } 
                            else 
                              {
                                ?>
                                <td><?php echo "active"; ?></td>
                                <?php } ?>
                        </tr>

 
              <?php  } ?> 
            </table>
                   
           </div>  
      </body>  
 </html>  
