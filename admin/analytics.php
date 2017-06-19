<!DOCTYPE html>
 <?php include '../dbconfig.php'; ?>  
 <html>  
      <head>  
           <title>Tech2Mail</title>   
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
      .navbar
{
  border-radius: 0px;
}
      </style>
  <body>
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
    <?php
session_start();
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
} 
?>
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
<div class="container">
  <center><div id="columnchart_values" style="width=100%; height:400px;"></div></center>
</div>
 	<?php 
  $date = date('d-m-Y');
$date= strtotime($date);

$prev_date = strtotime("-1 week");
 	 $lista = array();
  $dens = array();
  $cor = array();
  $i=0;
  $sql= "SELECT news.title title, COUNT( likes.news_id ) total_likes FROM news, likes WHERE likes.news_id = news.news_id and date > $prev_date and date <= $date GROUP BY likes.news_id order by likes.news_id";
  $resultado=mysql_query($sql);
  $count=mysql_num_rows($resultado);
  if($count == 0)
  {
      echo '<center><h1 style="color:red;">NO DATA FOUND</h1></center>';

  }
  else
  {
    while($row = mysql_fetch_assoc($resultado))
    {
      $id = $row['title'];
      $likess = $row['total_likes'];
      $lista[$i] = $id;
      $dens[$i]=$likess;
      $i=$i+1;
    } ?>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart1);
    function drawChart1() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Likes", { role: "style" } ],
          <?php 
            $k=$i;
             for ($i = 0; $i < $k; $i++) { ?>
              ['<?php echo $lista[$i] ?>',<?php echo $dens[$i] ?>,'<?php echo $cor[$i] ?>'],
              <?php } ?>
              ]);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      var options = {
        title: "NEWS VS LIKES",
        bar: {groupWidth: "30%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
   $(window).resize(function(){
      drawChart1();
      });
  </script>
   <?php } 
 ?>
  <div class="col-md-6">
    <div id="piechart_3d" style="width:100%; height: 500px;"></div>
     <?php 
     $sql= "SELECT users.email email, COUNT( likes.user_id ) total_likes FROM users, likes WHERE likes.user_id = users.user_id and date > $prev_date and date <= $date  GROUP BY likes.user_id order by likes.user_id desc limit 10";
    $resultado=mysql_query($sql);
    $s=mysql_num_rows($resultado);
    if($s == 0)
    {
      echo '<center><h1 style="color:red;">NO DATA FOUND</h1></center>';

    }
    else
    {
  ?>
    <script type = "text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['EMAIL', 'TOTAL LIKES'],
        <?php
          while($row=mysql_fetch_assoc($resultado))
          {
              $email = $row['email'];
              $email = str_replace('@innoraft.com','', $email);
              $email = str_replace('.',' ', $email);
              $email = ucwords($email);
            echo "['".$email."',".$row['total_likes']."],";
          }
        ?>
        ]);
        var options = {
          title: 'LIKES VS USERS'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
       
      }
        $(window).resize(function(){
          drawChart();
      });
    </script>
    <?php } ?>
  </div>
  <div class="col-md-6">
    <div id="piechart" style="width:100%; height: 500px; float:left;"></div>
    <?php 
       $sqlq= "SELECT news.category category, COUNT( likes.news_id ) total_likes FROM news, likes WHERE likes.news_id = news.news_id GROUP BY news.category order by likes.news_id";
  $result=mysql_query($sqlq);
  $m=mysql_num_rows($result);
  if($m == 0)
  {
    echo '<center><h1 style="color:red;">NO DATA FOUND</h1></center>';
  }
  else
  {
    ?>

    <script type = "text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['CATEGORY', 'TOTAL LIKES'],
        <?php
          while($row=mysql_fetch_assoc($result))
          {
              $category = $row['category'];
            echo "['".$category."',".$row['total_likes']."],";
          }
        ?>
        ]);
        var options = {
          title: 'CATEGORY VS LIKES'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
       $(window).resize(function(){
      drawChart2();
      });
    </script>
<?php } ?>
  
  </div>
  <hr>
<?php 
 $query = "SELECT users.email email, COUNT( likes.user_id ) total_likes FROM users, likes WHERE likes.user_id = users.user_id  GROUP BY likes.user_id order by likes.user_id desc limit 10";
 $result = mysql_query($query);
 ?> 
           <br /><br />  
           <div class="container">  
                
                <table class='table table-bordered' >  
                <tr>  
                <th>Email</th>  
                <th>Likes</th>
              <?php  
                  while($row = mysql_fetch_array($result))  
                {   ?>
                        <tr>
                        <td> <?php echo $row['email']; ?> </td>
                        <td> <?php echo $row['total_likes']; ?> </td>
                        </tr>

 
              <?php  } ?> 
            </table>
                   
           </div>  
  </body>
  </html> 
 