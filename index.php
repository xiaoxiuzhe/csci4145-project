<?php require_once 'assets/includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript">
    function Validate() {
    	var chef = document.getElementsByName("chef");
    	var date = document.getElementById("dtp_input1").value;
    	for(var i=0;i<chef.length;i++){
    	if(chef[i].checked==true && date != ""){
    		return true;
    	}
    	}
    	alert("Please pick a chef or date.");
    	return false;
    }
</script>

    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="restaurant web prototype">
    <meta name="author" content="xiuzhe xiao">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <!--<link href="assets/css/scrolling-nav.css" rel="stylesheet"> -->
    <style>

    /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */

    body {
      padding-bottom: 40px;
      color: #5a5a5a;
    }
	.dinner{
		font-family:"Brush Script MT";
		font-size:400%;
		color:#fff
	}


    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 99;
      margin-top: 20px;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {

    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }


    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
      height:100%;
      
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 500px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }



    /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }
    .circle{
    	hight:200px;width:300px;
    	border-radius:50%;
    }


    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }


    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }

      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        max-height:40%
        margin: 0 auto 20px;
      }
    }


    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 400px;
      }
      .carousel img {
        height: 400px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .marketing .span4 + .span4 {
        margin-top: 40px;
      }

      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }

    }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>

  <body>



    <!-- NAVBAR
    ================================================== -->
    
        <!-- NAVBAR
    ================================================== -->
    <div class="navbar-wrapper">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse"; style="opacity:0.9">
          <div class="navbar-inner" >
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" >
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h1 class="dinner">East Foodies</h1>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse" >
              <ul class="nav nav-pills">
                <li class="active"><a href="#">Home</a></li>                
                <li><a href="Menu.php">Menu</a></li>
                <li><a class="page-scroll" href="#Reserve">Reserve</a></li>
                <?php 
                	if($_SESSION['PHP_AUTH_TYPE'] == "admin"){
                		echo '<li><a href="order.php">Order</a></li>
                				<li><a href="myprofile.php">MyProfile</a></li>';
                	}	
                	else if($_SESSION['PHP_AUTH_TYPE'] == "user"){
                		echo '<li><a href="order.php">MyOrder</a></li>
                				<li><a href="myprofile.php">MyProfile</a></li>';
                	}
                ?>
              </ul>
              <ul class="nav" style="float:right">
              <?php 
              if($_SESSION['PHP_AUTH_TYPE'] == "admin" || $_SESSION['PHP_AUTH_TYPE'] == "user"){
              		//echo '<li><p style="color:white;space:nowrap">welcome ' .$_SESSION['PHP_AUTH_USER'].'</P><li>';
              		echo '<li><a style="color:white">welcome ' .$_SESSION['PHP_AUTH_USER'].'</a></li>
              			<li><a href="assets/includes/logout.inc.php">Logout</a></li>';
              }
              else if($_SESSION['PHP_AUTH_TYPE'] == "guest"){
              	echo '<li class="nav-login"><a href="signin.php">Login</a></li>';
              }
              	?>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" >
      <div class="carousel-inner">
        <div class="item active">
          <img src="assets/img/figure1.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>VIP Reserved</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="signup.php">Sign up today</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/img/figure2.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Our New Menu</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="Menu.php">Learn more</a>
            </div>
          </div>
        </div>
      
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="span4">
          <img class="circle" src="assets/img/chef1.jpg">
          <h2>Sanjeev Kapoor</h2>
          <p>Here we introduce some of the personalities those have proved again that India is a country of foods (and festivals). The compilation is certainly going to be interesting for those have fun in playing with kitchen accessories. Let��s have a look.</p>
          <p><a class="page-scroll" href="#Reserve"">reserve &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="circle" src="assets/img/chef2.jpg">
          <h2>Michel Albert Roux</h2>
          <p>Michel Roux the best chefs in UK. Michel is currently a 2 star Michelin chef at Le Gavroche. Born on 23rd May 1960, Michel found himself in a family of food lovers and a chef (His father). He took his first chef job and spent 2 years working under his father. Prior to that Michel had spent his early adult life training with the French Army. </p>
          <p><a class="page-scroll" href="#Reserve"">reserve &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="circle" src="assets/img/chef3.jpg">
          <h2>Raymond Blanc</h2>
          <p>Raymond Blanc is another popular and successful chef in UK which is why he makes to the list of top chefs in the UK. Born on 19th November 1949, Raymond has achieved a lot as a chef despite starting out with no formal training.</p>
          <p><a class="page-scroll" href="#Reserve"">reserve &raquo;</a></p>
        </div><!-- /.span4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-right" style="height:300px;width:400px" src="assets/img/food1.jpg">
        <h2 class="featurette-heading">Goose Liver </h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-left" style="height:300px;width:400px" src="assets/img/food2.jpg">
        <h2 class="featurette-heading">Caviar</h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-right" style="height:300px;width:400px" src="assets/img/food3.jpg">
        <h2 class="featurette-heading">lamb chop</h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      
        <!-- RESERVATION -->
       <h1  id="Reserve">Reservation</h1>
       <form action="confirmOrder.php" method="post">
       <h2>Step1: Pick a Chef</h1>
      	<div class="row">
        <div class="span4">
          <img class="circle" src="assets/img/chef1.jpg">
          <h2>Sanjeev Kapoor</h2>
          	<label>
          		<input style="position:relative; top:-3px;" type="radio" value="Sanjeev Kapoor" name="chef"> Pick him
       		</label>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="circle" src="assets/img/chef2.jpg">
          <h2>Michel Albert Roux</h2>
          	<label>
          		<input style="position:relative; top:-3px;" type="radio" value="Michel Albert Roux" name="chef"> Pick him
       		</label>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="circle" src="assets/img/chef3.jpg">
          <h2>Raymond Blanc</h2>
          	<label>
          		<input style="position:relative; top:-3px;" type="radio" value="Raymond Blanc" name="chef"> Pick him
       		</label>
        </div><!-- /.span4 -->
      </div><!-- /.row -->
      <h2>Step2: Pick a Time</h1>
      <div class="container">
            <div class="form-group">
                <label for="dtp_input1" class="col-md-2 control-label"></label>
                <div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" name="date" id="dtp_input1" value="" /><br/>
            </div>
	</div>
	 <input class="btn btn-large btn-primary" type="submit" value="Submit" onclick="return Validate()"/>
	</form>
     <!-- END OF RESERVATION -->
		

      <!-- FOOTER -->
      <footer>
      	<hr>
        <p class="pull-right"> <a class="page-scroll" href="#myCarousel">Back to top</a></p>
        <p>copyright &copy; xiuzhe xiao &middot; </p>
      </footer>

    </div><!-- /.container -->
    
    



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
	<script src="assets/js/scrolling-nav.js"></script>
	<script src="assets/js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="assets/js/holder/holder.js"></script>
  </body>
</html>