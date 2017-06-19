<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php

include 'dbconfig.php';
if(isset($_GET['datee']))
{

  $date=$_GET['datee'];
   $date= strtotime($date);
  $lista = array();
  $dens = array();
  $cor = array();
  $i=0;
  $sql= "SELECT news.title title, COUNT( likes.news_id ) total_likes FROM news, likes WHERE likes.news_id = news.news_id AND date = $date GROUP BY likes.news_id order by likes.news_id";
  $resultado=mysql_query($sql);
  $count=mysql_num_rows($resultado);
  if($count == 0)
  {
      echo '<h1 style="color:red;">NO DATA FOUND</h1>';
      exit();

  }
    while($row = mysql_fetch_assoc($resultado))
    {
      $id = $row['title'];
      $likess = $row['total_likes'];
      $lista[$i] = $id;
      $dens[$i]=$likess;
      $i=$i+1;
    } 
  }
?>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
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
        height: 500,
        bar: {groupWidth: "40%"},
        legend: { position: "none" },
         vAxis: { 
             title :'Number of likes',

              },
        hAxis: {
               title :'News',
              }

      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
   $(window).resize(function(){
      drawChart();
      });
  </script>
