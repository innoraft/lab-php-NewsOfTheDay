<?php
include 'dbconfig.php';
if(isset($_GET['datee']))
{
 // $date ='2017-05-15'; $_GET['datee'];
  //$date = str_replace('/', '-', $originalDate);
  //$date = date("Y-m-d", strtotime($date));
  $date=$_GET['datee'];

  
  $lista = array();
  $dens = array();
  $cor = array();
  $cor[0] = '#ff3300';
  $cor[1] = '#0000ff';
  $cor[2] = '#006600';
  $cor[3] = '#ff0066';
  $cor[4] = '#ff0067';
  $i=0;
  $sql= "SELECT news.title title, COUNT( likes.news_id ) total_likes FROM news, likes WHERE likes.news_id = news.news_id AND date_time = '$date' GROUP BY likes.news_id order by likes.news_id desc limit 5";
  $resultado=mysql_query($sql);
    while($row = mysql_fetch_assoc($resultado))
    {
      $id = $row['title'];
      $likess = $row['total_likes'];
      $lista[$i] = $id;
      $dens[$i]=$likess;
      $i=$i+1;

    } 
  }
  else
  {
    $date=date("Y-m-d");
  $lista = array();
  $dens = array();
  $cor = array();
  $cor[0] = '#ff3300';
  $cor[1] = '#0000ff';
  $cor[2] = '#006600';
  $cor[3] = '#ff0066';
  $cor[4] = '#ff0067';
  $i=0;
  $sql= "SELECT news.title title, COUNT( likes.news_id ) total_likes FROM news, likes WHERE likes.news_id = news.news_id AND date_time = '$date' GROUP BY likes.news_id order by likes.news_id desc limit 5";
  $resultado=mysql_query($sql);
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        width: 1200,
        height: 600,
        bar: {groupWidth: "65%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>


