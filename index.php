<!DOCTYPE html>
<?php include 'dbconfig.php'; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TECH2MAIL</title>
    <link rel="shortcut icon" href="img/5.ico" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
         <link rel="stylesheet" type="text/css" href="css/style.css">
             <link rel="stylesheet" type="text/css" href="css/animate.css">
     <script type = "text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    
  
  <body>
    <!--header-->
    <header class="main-header" id="header">
        <div class="bg-color">
            <!--nav-->
            <nav class="nav navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="col-md-12">
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                            <span class="fa fa-bars"></span>
                        </button>
                            <a href="#" class="navbar-brand">TECH<font color="#FFD34E">2</font>MAIL</a>
                        </div>
                        <div class="collapse navbar-collapse navbar-right" id="mynavbar">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#header">Home</a></li>
                                <li><a href="#news">Tech News</a></li>
                                <li><a href="#register">Register</a></li>
                                <li><a href="#analytics">Analytics</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ nav-->
            <div class="container text-center">
                <div class="wrapper wow fadeInUp delay-05s" style="margin-top: 150px;" >
                    <h2 class="sub-title">TECH2MAIL</h2>
                    <h4 class="sub-title">We Create Tech News For you</h4>
                </div>
            </div>
        </div>
    </header>


    <section id="news" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInLeft delay-05s">
                    <div class="section-title">
                        <center><h2 class="head-title">Technology News</h2>
                        <hr class="bottm-line"></center>
                    </div>
                </div>
                <div class="col-md-12">
                <?php 
                	 $tnews="SELECT * from news order by pubdate desc limit 6";
                        $tnews=mysql_query($tnews); 
                        while($news=mysql_fetch_assoc($tnews)) { ?>
                        <div class="panel panel-warning one-edge-shadow wow fadeInDown delay-05s" style="border: 2px solid #FFD34E;box-shadow: 0 10px 18px -6px black;">
                              <div class="panel-heading" style="background:#FFD34E;"> <?php echo '</b><a style="color:black;font-size:18px;" href="'.$news['link'].'">&nbsp;'.$news['title'].'</a>' ?> </div>
                              <div class="panel-body" style="font-size:17px;">
                              <div class="col-md-4" style="padding-left:43px;padding-top:11px;">
                               <?php echo '<img src="'.$news['image'].'" width=250px; height=150px >'?>
                               </div>
                                <div class="col-md-8" style="font-family: 'Flamenco';">

                                    <?php echo '<b> Category :'.$news['category']. '</b><div style="float:right;font-size :15px;"><b>Publish Date: '.date("d-m-Y",$news['pubdate']).'</b></div><br>'; ?>
                                  
                                    <?php echo '<font color="black">' .$news['description']. '</font>'?>
                                    <br>
                                  

                                <a id="new-board-btn" class="btn btn-success" style="background:#FFD34E; float:right;color:black;border:1px solid #FFD34E; " href="<?php echo $news['link'] ?>" target="_blank">Read More</a>
                                <a id="new-board-btn" class="btn btn-success" style="background:#FFD34E;color:black;float:right;border:1px solid #FFD34E;margin-right: 5px; " href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $news['link'] ?>" target="_blank">Share on Facebook</a>
                               </div>  

                			</div>
            </div>
            <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <!---->
    <section class="section-padding parallax bg-image-2 section wow fadeIn delay-08s" id="register">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="cta-txt">
                        <h3>Subscribe To Tech2mail</h3>
                        <p>Get daily updates on technology news all over the world into your email</p>
                    </div>
                </div>
                <div class="col-md-4 text-center form-fill">
                    <div id="form-fillup">
                        <h4 style="float:left;">EMAIL:</h4>
                      <form id="submit_form">    
                   <input type="email" name="email" id="email" class="form-control" placeholder=" Enter Your Email Id" required /> 
                     <span><span style="float:left;"  id="error_message" class="text-danger">&nbsp;</span>
                     <span style="float:left;" id="success_message" class="text-success">&nbsp;</span></span><br>
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
            var allowedDomains = [ 'innoraft.com' ]; 
            var domain = $("#email").val().split("@")[1];
           if(email == '')  
           {  
                $('#error_message').html('<font color="red"><b>Email required</b></font>');  
           }  
           else  
           {  
              if ($.inArray(domain, allowedDomains) !== -1)
              {
                 $('#error_message').html('');  
                $.ajax({  
                     url:"insert.php",  
                     type:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $("#submit_form").trigger("reset");  
                          $('#success_message').css('visibility', 'visible').html(data);  
                          setTimeout(function(){  
                               $('#success_message').css('visibility', 'hidden');  
                          }, 4000);  
                     }  
                });  

              }
              else{
                      $('#error_message').html('<font color="red"><b>Unauthorized Domain name</b></font>');
                       setTimeout(function(){  
                               $('#error_message').css('visibility', 'hidden');  
                          }, 4000);  
                         $('#error_message').css('visibility', 'visible');
              }
           }  
      });  
 });  
 </script>     

    <section class="section-padding wow fadeInUp delay-02s" id="analytics">
        <div class="container">
            <div class="row">
                    <div class="section-title">
                        <center><h2 class="head-title">Analytics</h2></center>
                        <center><hr class="bottm-line"><center>
                	</div>
                	<div class="col-md-12">
                	<center>
                	<form>
     <input type="date" name="datee" id="datee" style="border: 3px double #CCCCCC;width: 230px;">
    <button type="button" class="btn btn-primary" id="submit1">Analytics</button>
  </form>
  </center>
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
             
              <div style="text-align:center;" id="columnchart_values"></div>
				  </div>
				  <div class="col-md-6">
				  	<?php include 'usergraph.php'; ?>
              <div id="piechart_3d" style="height:500px; width=100%;"></div>
				  	
				  </div>
				  <div class="col-md-6">
               <?php include 'categorygraph.php'; ?>
             <div id="piechart" style="height:500px;width=100%;"></div>
				   
				  </div>
        </div>
    </section>
    <section class="wow fadeInUp delay-02s">
      <?php  
        $query = "SELECT count(*) total_news from news";  
        $result = mysql_query($query);
         $row = mysql_fetch_array($result);
      ?>
  <div class="container">
    <div class="row">
    <div class="col-md-3 col-xs-6">
      <div class="panel panel-default">
          <div class="panel-body panelbody text-center">
          <i class="fa fa-newspaper-o fa-4x"></i>
          <div class="center">
           <p class="value"><?php echo $row['total_news']; ?></p>
           <hr class="line">
           <p class="text">Total News</p>
            
          </div>
        </div>
        </div>
    </div>

    <?php  
        $query = "SELECT count(*) total_likes from likes";  
        $result = mysql_query($query);
         $row = mysql_fetch_array($result);
      ?>

    <div class="col-md-3 col-xs-6">
      <div class="panel panel-default">
          <div class="panel-body panelbody text-center">
          <i class="fa fa-thumbs-up fa-4x"></i>
            <div class="center">
           <p class="value"><?php echo $row['total_likes']; ?></p>
           <hr class="line">
           <p class="text">News Likes</p>
            
          </div>
          </div>
        </div>
    </div>
    <?php  
        $query = "SELECT count(*) total_users from users";  
        $result = mysql_query($query);
         $row = mysql_fetch_array($result);
      ?>
    <div class="col-md-3 col-xs-6">
      <div class="panel panel-default">
          <div class="panel-body panelbody text-center">
          <i class="fa fa-users fa-4x"></i>
          <div class="center">
          
           <p class="value"><?php echo $row['total_users']; ?></p>
           <hr class="line">
           <p class="text">Users</p>
            
          </div>
          </div>
        </div>
    </div>
    <?php  
        $query = "SELECT count(DISTINCT category) total_category from news";  
        $result = mysql_query($query);
         $row = mysql_fetch_array($result);
      ?>
    
    <div class="col-md-3 col-xs-6" >
      <div class="panel panel-default">
          <div class="panel-body panelbody text-center">
          <i class="fa fa-align-justify fa-4x"></i>
            <div class="center">
           <p class="value"><?php echo $row['total_category']; ?></p>
           <hr class="line">
           <p class="text">News Categories</p>
            
          </div>
          </div>
        </div>
    </div>
    </div>
  </div>
</section>
    <!---->
   	<section class="section-padding wow fadeInUp delay-05s" id="contact">
        <div class="container">
            <div class="row white">
               
                    <div class="section-title">
                        <center><h2 class="head-title">Contact Us</h2></center>
                        <center><hr class="bottm-line"></center>

                        <br>
                    </div>
             
                    <div class="col-md-8">
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
    <div style="background:#f8f8f8;padding-top:180px;">
        <div class="text-center logo-img">
            <img src="img/2017-05-02.png"></div>
                 <div class="text-center">
                     <a href="https://www.facebook.com/sharer/sharer.php?u=http://news-of-the-day.sites.innoraft.com" class="btn btn-submit">Share On Facebook</a>
                     <a href="https://twitter.com/intent/tweet?url=http://news-of-the-day.sites.innoraft.com" class="btn btn-submit">Share On Twitter</a>
                </div>
            <br>
            <a href="admin/index.php"><div class="text-center"><i class="fa fa-user fa-4x">Admin Portal</i></div></a>
            <div class="text-center"><h4>&copy INNORAFT SOLUTION PVT. LTD.</h4></div>
          </div>

</section>


    <!---->
    <!---->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>