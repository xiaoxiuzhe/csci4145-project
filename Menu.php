<?php require_once 'assets/includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="restaurant web prototype">
    <meta name="author" content="xiuzhe xiao">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
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
	
	
    /* CUSTOMIZE THE Header
    -------------------------------------------------- */
	.header-wrapper{
		background-image:url('assets/img/food.jpg');
		background-position:center;
		background-repeat:no-repeat ;
		background-size:100% 100%; 
	}    
	.header-inner{
		margin:0 auto;
		text-align:center;
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
	.menu-wrapper{
		width:80%;
		height:90%;
		margin:10px 10% auto 10%;

		 text-align: center;
	}
	.header-wrapper{
		width:100%;
		height:500px;
	}
	.header-inner{
		position: relative;
		top:250px;
		margin:0 auto;
		text-align:center;
		max-width:500px;
	}

    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }


      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }
	.menu-wrapper{
		width:80%;
		height:90%;
		margin:10px 10% auto 10%;
		text-align: center;
		 
	}
	.header-wrapper{
		width:100%;
		height:300px;
		
    }
	.header-inner{
		position: relative;
		top:150px;
		max-width:500px;
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
                <li ><a href="index.php">Home</a></li>                
                <li class="active"><a href="#Menu">Menu</a></li>
                <li><a href="index.php#Reserve">Reserve</a></li>
                <?php 
                	if($_SESSION['PHP_AUTH_TYPE'] == "admin"){
                		echo '<li><a href="order.php">Order</a></li>;
                				<li><a href="myprofile.php">MyProfile</a></li>';
                	}	
                	else if($_SESSION['PHP_AUTH_TYPE'] == "user"){
                		echo '<li><a href="order.php">MyOrder</a></li>;
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

     <!-- header
    ================================================== -->
    <div class="header-wrapper">
    	<div class="header-inner">
    		<h1 style="color:white">SEASONAL MENU 2016 </h1>
    	</div>
    </div>
    
    
    <!-- Menu
    ================================================== -->
    <div style="width:100%;height:100%">
    	<div class="menu-wrapper">
    		<img src="assets/img/menu.png" alt="" style:"width: 100%; height: 100%; vertical-align: middle;">
    	</div>
    </div>

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
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
