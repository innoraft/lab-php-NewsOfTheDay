

<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="img/22.png">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TECH2MAIL</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style type="text/css">

    input {font-family:FontAwesome;}
    a
    {
        color: black;
    }
    #chart-container 
    {
                width: 640px;
                height: auto;
    }
    #email{
        width: 300px;
        margin: 0;
        display: inline-block;
    }
    </style>
  </head>
  <body>
    <!--header-->
    <header class="main-header" id="header">
        <div class="bg-color">
            <!--nav-->
            <div id='preloader'></div>
            <nav class="nav navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="col-md-12">
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                            <span class="fa fa-bars"></span>
                        </button>
                            <a href="localhost/Bethany/index.php" class="navbar-brand">TECH<strong style="color:#FFD34E; font-size:1.5em;">2</strong>MAIL</a>
                        </div>
                        <div class="collapse navbar-collapse navbar-right" id="mynavbar">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#header">Home</a></li>
                                <li><a href="#feature">Daily News</a></li>
                                  <li><a href="#register">Register</a></li>
                                <li><a href="#portfolio">Analytics</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ nav-->
            <div class="container text-center">
                <div class="wrapper " >
                    <h2 class="top-title">TECH<strong style="color:#FFD34E; font-size:1.5em;">2</strong>MAIL</h2>
                    <h3 class="title" style="font-family:Oswald;">GET <font color="#FFD34E">TECH</font> NEWS<br>
                    <h4 class="sub-title" >Subscribe to <font style="font-size:40px;">TECH<strong style="color:#FFD34E; font-size:1.5em;">2</strong>MAIL</font> and get daily tech news update all over the world in your email and do like our tech news  </h4>
                </div>
            </div>
        </div>
    </header>

    <section id="feature" class="section-padding">
        <div class="container">
       				 <h3 class="head-title" style="font-family:Oswald; text-align:Center; font-size:55px;"> TECH NEWS</h3> 

       				 <br>
       				 <div class="row">
       				 <?php
				$xml=simplexml_load_file("https://news.google.co.in/news?cf=all&hl=en&pz=1&ned=in&topic=tc&output=rss");
				foreach ($xml->channel->item as $itm)
				{
                        $title = $itm->title;
                        $link=$itm->link;
						$description = $itm->description;

						?>	
							
							<div class="col-md-12 ">
							 <div class="panel panel-primary wow fadeInDown delay-05s" style="box-shadow: 10px 10px 5px #888888;">
						      <div class="panel-heading"> <?php echo '<a style="color:black;font-size:18px;" href="'.$link.'">'.$title.'</a>' ?> </div>
						      <div class="panel-body" style="font-size:17px;">
						      <?php
						         $description=str_replace("table", "div", $description);
                                 $description=str_replace("/table", "/div", $description); 
                                 $description= preg_replace( '/style=(["\'])[^\1]*?\1/i', '', $description, -1 );
                                 $description=strip_tags($description,'<img><a></a>');

                                 $doc = new DOMDocument();
                                 $doc->loadHTML($description);
                                 $xpath = new DOMXPath($doc);
                                 $src = $xpath->evaluate("string(//img/@src)");
                                 $description = preg_replace("/<img[^>]+\>/i", " ", $description); 
					           ?>
                               <div class="col-md-2" style="padding-left:43px;padding-top:11px;">
                               <?php echo '<img src="'.$src.'" width=100px; height=100px >'?>
                               </div>
                                <div class="col-md-10" style="font-family: 'Flamenco';">
                                    <?php echo '<font color="black">' .$description. '</font>'?>
                                <a id="new-board-btn" class="btn btn-success" style="background:#337ab7; float:right;" href="<?php echo $link ?>" target="_blank">Read More</a>
                               </div>  
						      </div>
						    </div>
						    </div>
						   
				<?php } ?>
					</div> 
        </div>
    </section>

    <section class="section-padding parallax bg-image-2 section wow fadeIn delay-08s" id="register">
        <div class="container">
            <div class="row" id="section-row">
                <div class="col-md-8">
                    <div class="cta-txt">
                        <h3 style="head-title">Subscribe For Updates</h3>
                        <p>Join us and get access to the latest Technology news all over the world!</p>
                    </div>
                </div>
                <div class="col-md-4 form-fill">
                    <div id="form-fillup">
                        <h4>EMAIL:</h4>
                      <form id="submit_form">    
                     <input type="email" name="email" id="email" class="form-control" placeholder=" &#xf0e0;   Enter Your Email Id" required /> 
                     <div><span id="error_message" class="text-danger">&nbsp;</span>
                     <span id="success_message" class="text-success">&nbsp;</span></div>
                     <input type="button" name="submit" id="submit" class="btn btn-submit" value="Subscribe Now" />
                      
                    </form>  
                    </div>
                </div>
            </div>
        </div>
    </section>  
       <script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var email = $('#email').val();  
           if(email == '')  
           {  
                $('#error_message').html("Email required");  
           }  
           else  
           {  
                $('#error_message').html('');  
                $.ajax({  
                     url:"insert.php?email="+email,  
                     type:"GET",  
                     //data:{email:email},  
                     success:function(data){  
                          $("form").trigger("reset");  
                          $('#success_message').css('visibility', 'visible').html(data);  
                          setTimeout(function(){  
                               $('#success_message').css('visibility', 'hidden');  
                          }, 3000);  
                     }  
                });  
           }  
      });  
 });  
 </script>     
    <!---->
    <!---->
    <section class="graph wow fadeInUp delay-02s" id="portfolio">
        <h1 class="head-title" style="text-align:center; font-family:Oswald;">ANALYTICS</h1>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                 <div style="text-align:center;font-family:Oswald;"><h2>TOP LIKES NEWS</h2></div>    
      <form>
     <input type="date" name="datee" id="datee" style="border: 3px double #CCCCCC;width: 230px;">
    <button type="button" class="btn btn-primary" id="submit1">Analytics</button>
  </form>
  <script>
     $(document).ready(function(){  
      $('#submit1').click(function(){  
           var datee = $('#datee').val();  
           if(datee == '')  
           {  
                $('#error_message').html("date required");  
           }  
           else  
           {  
                $('#error_message').html('');  
                $.ajax({  
                     url:"graph.php?datee="+datee,  
                     type:"GET",  
                     //data:{email:email},  
                     success:function(data){

                          $('#columnchart_values').css('visibility', 'visible').html(data);  
                     }  
                });  
           }  
      });  
 });  
  </script>    
              <?php include 'graph.php'; ?>
              <div style="text-align:center;height:600px;" id="columnchart_values"></div>
            </div>
          </div>
        </div>
        <hr>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div style="text-align:center;font-family:Oswald;"><h2>TOP ACTIVE FOLLOWERS</h2></div>
              <div style="padding-left:110px;">
                 <?php include 'usergraph.php' ?>
                <div id="piechart" style="width:1200px; height: 600px;"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="top5">
            <div class="container">
                <h1 class="head-title" style="text-align:center; font-family:Oswald;">TOP LIKES</h1>
                <div class="col-md-12">
                    <?php
                        $tnews="SELECT * from news where day != '' order by total_like desc limit 5";
                        $tnews=mysql_query($tnews);
                        while($news=mysql_fetch_assoc($tnews)) { ?>
                             <div class="panel panel-primary wow fadeInDown delay-05s" style="box-shadow: 10px 10px 5px #888888;">
                              <div class="panel-heading"> <?php echo '</b><a style="color:black;font-size:18px;" href="'.$news['link'].'">&nbsp;'.$news['title'].'</a>' ?> </div>
                              <div class="panel-body" style="font-size:17px;">
                              <div class="col-md-2" style="padding-left:43px;padding-top:11px;">
                               <?php echo '<img src="'.$news['image'].'" width=100px; height=100px >'?>
                               </div>
                                <div class="col-md-10" style="font-family: 'Flamenco';">

                                    <?php echo $news['pubdate'].'  Total likes :'.$news['total_like'].'<br>'; ?>
                                    <?php echo '<font color="black">' .$news['description']. '</font>'?>

                                <a id="new-board-btn" class="btn btn-success" style="background:#337ab7; float:right;" href="<?php echo $link ?>" target="_blank">Read More</a>
                               </div>  

                </div>
            </div>
            <?php } ?>


        </div>
    </section>
    <!---->
    <!---->
    <section class="section-padding wow fadeInUp delay-05s" id="contact">
        <div class="container">
            <div class="row white">
                <div class="col-md-8 col-sm-12">
                    <div class="section-title">
                        <h2 class="head-title black" style="font-family:Oswald;">Contact Us</h2>
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="col-md-4 col-sm-6" style="padding-left:0px;border:2px solid black">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.1834314983844!2d88.43324946460916!3d22.57224178518296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277a65fec339f%3A0xa4fb56bef5c0c97d!2sInnoraft+Solutions+Private+Limited!5e0!3m2!1sen!2sin!4v1494044022388" width="375" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3 class="cont-title">Visit Us</h3>
                        <div class="location-info">
                            <p class="white"><span aria-hidden="true" class="fa fa-map-marker"></span>2nd floor, Kredent Tower, J-1/14, Block EP & GP, Sector, EP Block, Sector V, Salt Lake City, Kolkata, West Bengal 700091</p>
                            <p class="white"><span aria-hidden="true" class="fa fa-phone"></span>Phone: 033 2262 4671</p>
                            <p class="white"><span aria-hidden="true" class="fa fa-envelope"></span>Email: <a href="" class="link-dec">rudranil.sarkar@innoraft.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-icon-container hidden-md hidden-sm hidden-xs">
                            <span aria-hidden="true" class="fa fa-envelope-o"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    <div style="background:#f8f8f8; padding-top:107px;">
        <div class="text-center logo-img">
            <img src="img/2017-05-02.png"></div>
                 <div class="text-center">
                     <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Finnoraft.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="btn btn-submit">Share On Facebook</a>
                     <a href="https://twitter.com/intent/tweet?url=innoraft.com&original_referer=" class="btn btn-submit">Share On Twitter</a>
                </div>
            <br>
           <div class="text-center"><h3>&copy RUDRANIL SARKAR</h3></div>
            <div class="text-center"><h4>INNORAFT SOLUTION PVT. LTD.</h4></div>
          </div>

</section>
    <!---->
    <!---->
    <!---->
    <!--contact ends-->
    <script src="js/jquery.min.js"></script>>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    <script>

    jQuery(document).ready(function($){
      $(window).load(function(){
        $('#preloader').fadeOut('slow',function(){$(this).remove();});
      });
    });
  </script>

    
  </body>
</html>
