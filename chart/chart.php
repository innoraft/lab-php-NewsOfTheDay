  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
<?php
include '../dbconfig.php';
 // $date ='2017-05-15'; $_GET['datee'];
  //$date = str_replace('/', '-', $originalDate);
  //$date = date("Y-m-d", strtotime($date));
  $sql= "SELECT users.email email, COUNT( likes.user_id ) total_likes FROM users, likes WHERE likes.user_id = users.user_id  GROUP BY likes.user_id order by likes.user_id desc limit 10";
  $resultado=mysql_query($sql);
?>
   <html>
  <head>
   <html>
  <head>
    <script type = "text/javascript">
     Morris.Bar({
  element: 'bar-example',
  data: [
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
  ],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Series A', 'Series B']
});
    </script>
<html>
<head>

<meta charset=utf-8 />
<title>Morris.js Bar Chart Example</title>
</head>
<body>
  <div id="bar-example"></div>
</body>
</html>


