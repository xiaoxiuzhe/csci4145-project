<?php require_once 'assets/includes/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Comments</title>
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

	.blog-comment::before,
	.blog-comment::after,
	.blog-comment-form::before,
	.blog-comment-form::after{
	    content: "";
		display: table;
		clear: both;
	}
	
	.blog-comment{
	    padding-left: 15%;
		padding-right: 15%;
	}
	
	.blog-comment ul{
		list-style-type: none;
		padding: 0;
	}
	
	.blog-comment img{
		opacity: 1;
		filter: Alpha(opacity=100);
		-webkit-border-radius: 4px;
		   -moz-border-radius: 4px;
		  	 -o-border-radius: 4px;
				border-radius: 4px;
	}
	
	.blog-comment img.avatar {
		position: relative;
		float: left;
		margin-left: 0;
		margin-top: 0;
		width: 65px;
		height: 65px;
	}
	
	.blog-comment .post-comments{
		border: 1px solid #eee;
	    margin-bottom: 20px;
	    margin-left: 85px;
		margin-right: 0px;
	    padding: 10px 20px;
	    position: relative;
	    -webkit-border-radius: 4px;
	       -moz-border-radius: 4px;
	       	 -o-border-radius: 4px;
	    		border-radius: 4px;
		background: #fff;
		color: #6b6e80;
		position: relative;
	}
	
	.blog-comment .meta {
		font-size: 13px;
		color: #aaaaaa;
		padding-bottom: 8px;
		margin-bottom: 10px !important;
		border-bottom: 1px solid #eee;
	}
	
	.blog-comment ul.comments ul{
		list-style-type: none;
		padding: 0;
		margin-left: 85px;
	}
	
	.blog-comment-form{
		padding-left: 15%;
		padding-right: 15%;
		padding-top: 40px;
	}
	
	.blog-comment h3,
	.blog-comment-form h3{
		margin-bottom: 40px;
		font-size: 26px;
		line-height: 30px;
		font-weight: 800;
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
		background-image:url('assets/img/comment.jpg');
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

	.blog-comment .post-comments{
	border: 1px solid #eee;
    margin-bottom: 20px;
    margin-left: 0px;
	margin-right: 0px;
    padding: 5px 10px;
    position: relative;
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
       	 -o-border-radius: 4px;
    		border-radius: 4px;
	background: #fff;
	color: #6b6e80;
	position: relative;
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
	.header-wrapper{
		width:100%;
		height:300px;
		
    }
	.header-inner{
		position: relative;
		top:150px;
		max-width:500px;
	}
	
	.blog-comment .post-comments{
	border: 1px solid #eee;
    margin-bottom: 20px;
    margin-left: 0px;
	margin-right: 0px;
    padding: 5px 10px;
    position: relative;
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
       	 -o-border-radius: 4px;
    		border-radius: 4px;
	background: #fff;
	color: #6b6e80;
	position: relative;
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
                <li><a href="Menu.php">Menu</a></li>
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
                <li><a class="page-scroll" href="index.php#ContectUs">Contect Us</a></li>
                <li class="active"><a class="page-scroll" href="comment.php">Comment</a></li>
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
    		<h1>To help serve you better...</h1>
    	</div>
    </div>
    
     <!-- Comment
    ================================================== -->
	<div class="container">
	
		<div class="container bootstrap snippet">
		    <div class="row">
				<div class="col-md-12">
				    <div class="blog-comment">
						<h3>Comments</h3>
		                <hr/>
						<ul class="comments" id="commentArea">						
						
						</ul>
					</div>
				</div>
			</div>
		</div>
	
	
		<div class="container pb-cmnt-container">
		    <div class="row">
		        <div class="col-md-6 col-md-offset-3">
		            <div class="panel panel-info">
		                <div class="panel-body">
		                
		                    <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" id="Comment"></textarea>
		                    <?php 
		                    	$name = '';
		                    	if($_SESSION['PHP_AUTH_TYPE'] == "admin" || $_SESSION['PHP_AUTH_TYPE'] == "user"){
		                    		$name = $_SESSION['PHP_AUTH_USER'];
		                    	}
		                    ?>
		                    <button class="btn btn-primary pull-right" onclick="Share(<?php echo $name?>)">Share</button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		
		<style>
		    .pb-cmnt-container {
		        font-family: Lato;
		        margin-top: 100px;
		    }
		
		    .pb-cmnt-textarea {
		        resize: none;
		        padding: 20px;
		        height: 130px;
		        width: 100%;
		        border: 1px solid #F2F2F2;
		    }
		</style>
	
	
	</div><!-- /container -->
    
    
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
    <script src="assets/myjs/comments.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase-database.js"></script>
	<script>
	  // Initialize Firebase
	  var config = {
	    apiKey: "AIzaSyA_LhS4_7haSlWSTOsxG1QvSL2PY-njjsk",
	    authDomain: "csci4145-project.firebaseapp.com",
	    databaseURL: "https://csci4145-project.firebaseio.com",
	    projectId: "csci4145-project",
	    storageBucket: "csci4145-project.appspot.com",
	    messagingSenderId: "526450568274"
	  };
	  firebase.initializeApp(config);
	</script>
  </body>
</html>
    