<?php include '../dbconfig.php';
            if(isset($_POST['extract']))
            {
               $myquery = mysql_query("TRUNCATE TABLE likes");
              $query = mysql_query("delete from news");
            }
            header('Location:admin.php');
?>