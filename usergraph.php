<?php
include 'dbconfig.php';

 // $date ='2017-05-15'; $_GET['datee'];
  //$date = str_replace('/', '-', $originalDate);
  //$date = date("Y-m-d", strtotime($date));
  $sql= "SELECT user.email email, COUNT( likes.user_id ) total_likes FROM user, likes WHERE likes.user_id = user.user_id  GROUP BY likes.user_id order by likes.user_id desc limit 10";
  $resultado=mysql_query($sql);
?>
   <html>
  <head>
    <!--Load the AJAX API-->
   <html>
  <head>
    <script type = "text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
 