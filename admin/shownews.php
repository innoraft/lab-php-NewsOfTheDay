 <!DOCTYPE html>  
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
       <li><a href="admin.php">Home</a></li>
       <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["username"];?></a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>
           <br /><br />  
           <div class="container">  
                <h3 align="center">NEWS ARCHIVE</h3><br/>  
                <div><input type="date" id="date"></input> &nbsp;<button type="button" class="btn btn-primary" id="datee">Date filter</button>&nbsp;<a href="shownews.php"><button type="button" class="btn btn-primary" id="datee">Reset</button></a></div>
                <br>
                <div class="table-responsive" id="pagination_data">  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });
 </script>  
 <script>
     $(document).ready(function(){  
      $('#datee').click(function(){  
           var datee = $('#date').val();  
           if(datee == '')  
           {  
                $('#error_message').html("date required");  
           }  
           else  
           {  
                $('#error_message').html('');  
                $.ajax({  
                     url:"datefilter.php?datee="+datee,  
                     type:"GET",  
                     //data:{email:email},  
                     success:function(data){   
                     $('#pagination_data').html(data);  
                     }  
                });  
           }  
      });  
 });  
  </script>    