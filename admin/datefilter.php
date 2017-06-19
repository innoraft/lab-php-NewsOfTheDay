<?php
include '../dbconfig.php'; 
if(isset($_GET['datee']))
{
	$date=strtotime($_GET['datee']);
	$query = "SELECT * FROM news where pubdate = $date";  
 $result = mysql_query($query);  
 if(mysql_num_rows($result) > 0)
 {	
 $output .= "  
      <table class='table table-bordered' >  
           <tr>  
                <th>Title</th>  
                <th>Image</th>
                <th>Description</th>
                <th>Category</th>
                 <th width='10%'>Date</th>
           </tr>  
 ";  
 while($row = mysql_fetch_array($result))  
 {  
      $output .= '  
           <tr>  
                <td>'.$row["title"].'</td>  
                <td><img src='.$row["image"].'width=100px height=100px></td>
                <td>'.$row["description"].'</td>
                 <td>'.$row["category"].'</td>
                 <td>'.date("d-m-Y",$row['pubdate']).'</td>  
           </tr>  
      ';  
 }  
 echo $output;
}
else
{
	echo '<h1 style="color:red;">NO DATA FOUND </h1>';
}

}
?>