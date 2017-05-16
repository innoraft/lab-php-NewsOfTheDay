<?php
include 'dbconfig.php';
$i=1;
$xml=simplexml_load_file("https://news.google.co.in/news?cf=all&hl=en&pz=1&ned=in&topic=tc&output=rss");
	foreach ($xml->channel->item as $itm)
	{
	  
		$title = $itm->title;
		$link = $itm->link;
		$pubdate= $itm->pubDate;
		$description = $itm->description;


		 	$s = $pubdate;
    		$dt = new DateTime($s);
    		$date = $dt->format('Y-m-d');
		     $day=date('l', strtotime($date));

        		$description=str_replace("table", "div", $description);
       			$description=str_replace("/table", "/div", $description); 
        		$description= preg_replace( '/style=(["\'])[^\1]*?\1/i', '', $description, -1 );
        		$description=strip_tags($description,'<img><a></a>');

		        $doc = new DOMDocument();
		        @$doc->loadHTML($description);
		        $xpath = new DOMXPath($doc);
		        $src = $xpath->evaluate("string(//img/@src)");
		        $description = preg_replace("/<img[^>]+\>/i", " ", $description);


		        	 if($i <= 7)
		        	 {
		        	 	echo $title.'<br>';
		        	 	echo $description.'<br>';
		        	 	echo $date.'<br>';
		        	 	echo $day.'<br>';
		        		$sql = "INSERT INTO news (title,link,image,description,pubdate,day) VALUES ('$title','$link','$src','$description','$date','$day')";
		        		mysql_query($sql,$db);  
				 		
		        	 }
		        	 $i++;

	}
?>



