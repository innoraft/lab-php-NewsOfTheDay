  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
include 'dbconfig.php';
 // $date ='2017-05-15'; $_GET['datee'];
  //$date = str_replace('/', '-', $originalDate);
  //$date = date("Y-m-d", strtotime($date));
  $sql= "SELECT news.category category, COUNT( likes.news_id ) total_likes FROM news, likes WHERE likes.news_id = news.news_id GROUP BY news.category order by likes.news_id";
  $resultado=mysql_query($sql);
?>
    <script type = "text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['CATEGORY', 'TOTAL LIKES'],
        <?php
          while($row=mysql_fetch_assoc($resultado))
          {
              $category = $row['category'];
            echo "['".$category."',".$row['total_likes']."],";
          }
        ?>
        ]);
        var options = {
          title: 'CATEGORY VS LIKES',
          
        };
 
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
     $(window).resize(function(){
      drawChart1();
      });
    </script>
 