  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
include 'dbconfig.php';
 // $date ='2017-05-15'; $_GET['datee'];
  //$date = str_replace('/', '-', $originalDate);
  //$date = date("Y-m-d", strtotime($date));
  $date = date('d-m-Y');
$date= strtotime($date);

$prev_date = strtotime("-1 week");
  $sql= "SELECT users.email email, COUNT( likes.user_id ) total_likes FROM users, likes WHERE likes.user_id = users.user_id and date > $prev_date and date <= $date  GROUP BY likes.user_id order by likes.user_id desc";
  $resultado=mysql_query($sql);
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
