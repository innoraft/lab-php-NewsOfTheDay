<?php
include '../dbconfig.php'; 
 $record_per_page = 10;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM news ORDER BY pubdate DESC LIMIT $start_from, $record_per_page";  
 $result = mysql_query($query);  
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
 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM news ORDER BY pubdate DESC";  
 $page_result = mysql_query($page_query);  
 $total_records = mysql_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid black;background:white;' id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div><br /><br />';  
 echo $output;  
 ?>   