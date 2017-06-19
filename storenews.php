<?php
include 'dbconfig.php';
$xml=simplexml_load_file("http://feeds.feedburner.com/TechCrunch/");
$i = 0;
	foreach ($xml->channel->item as $itm)
	{
		$title = $itm->title;
		$link = $itm->link;
		$pubdate = $itm->pubDate;
	    $category = $itm->category;
	    $guid = $itm->guid;
		$description = $itm->description;




		 	$s = $pubdate;
    		$dt = new DateTime($s);
    		$date = $dt->format('Y-m-d');
		     $date= strtotime($date);
        		
        		$description=strip_tags($description,'<img><a></a>');
		        $doc = new DOMDocument();
		        @$doc->loadHTML($description);
		        $xpath = new DOMXPath($doc);
		        $src = $xpath->evaluate("string(//img/@src)");
		        $description = preg_replace("/<img[^>]+\>/i", " ", $description);
		         $description=strip_tags($description,'');
		         $description = preg_replace("/Read More/", " ", $description);
		        	
		         	$guid = str_replace("http://techcrunch.com/?p="," ",$guid);
		 		if($i <= 10)
		 		{    	
		        	$sql = "INSERT INTO news (guid,title,link,image,description,category,pubdate) VALUES ($guid,'$title','$link','$src','$description','$category',$date)";
		         	mysql_query($sql,$db);
		         	$i++;
		        }
		        		
	}
?>
