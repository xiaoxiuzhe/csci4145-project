<?php 
require_once 'assets/includes/db_connection.php'; 

if(!isset($_COOKIE[session_name()])){
	session_start();
	$_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
}
else{
	//session_start();
	if($_SESSION['HTTP_USER_AGENT'] != $_SERVER['HTTP_USER_AGENT']){
		$_SESSION['output1'] = "Please login before making a reservation";
		header("Location: signin.php");
	}

}


        if($_SESSION['PHP_AUTH_TYPE']=="guest" ){
        	header("Location: signin.php");
        }
        else if(!isset($_POST['chef']) ||!isset($_POST['date'])){
        	header("Location: index.php");
        }
        else{
        	$chef = $_POST['chef'];
        	$date = $_POST['date'];
        	$username = $_SESSION['PHP_AUTH_USER'];
        	$email = $_SESSION['email'];
        	$phone = $_SESSION['phone'];
        }
        
        if($chef=="Sanjeev Kapoor"){
        	$img = "chef1.jpg";
        }
        else if($chef=="Michel Albert Roux"){
        	$img = "chef2.jpg";
        }
        else{
        	$img = "chef3.jpg";
        }
        
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-size:100% 250%;
        -moz-background-size:100% 100%; 
        background-image: url("assets/img/figure2.jpg");
        background-repeat:no-repeat;
      }

      .form-signin {
        max-width: 700px;
        height: 500px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
         
      }
      .separate1{
      	height: 60%;	
      }
      .separate2{
      	height: 40%;	
      }
      .font{
      	font-size: 150%;
      }
       .title{
      	display:none;
      }
      .fill{
      	height:0px;
      }
      .chefimg{
      	max-width: 80%; max-height:80%; vertical-align: middle;
      }
      .button{
      	margin:2em 0px 0px 0px;
      }
      
      @media (max-width: 979px) {
      	.form-signin {
      		height:300px;
      	}
      	.separate1{
      	height: 100%;	
      	width:50%;
      	float:left;
      }
      .separate2{
      	height: 100%;	
      	width:50%;
      	float:left;
      }
       .title{
      	display:none;
      }
       .fill{
      	height:4em;
      }
      .chefimg{
      	max-width: 100%; max-height: 100%; vertical-align: middle;
      }
      .button{
      	margin:2em 0px 0px 0px;
      }
      }
       @media (max-width: 767px) {
      	.form-signin {
      		height:200px;
      	}
      	.separate1{
      		display:none;	
      }
      .separate2{
      		height: 100%;
      		width:100%;
      }
      .title{
      	display:inline;
      }
       .fill{
      	height:0px;
      }
      .chefimg{
      	max-width: 100%; max-height: 100%; vertical-align: middle;
      }
       .font{
      	font-size: 100%;
      }
      .button{
      	margin:1.5em 0px 0px 0px;
      }
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

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

    <div class="col-md-offset-3" style="position:relative;top:120px">
      <form class="form-signin" action="assets/includes/reservation.inc.php"  method="post">
      
        <?php //echo $_SESSION['outputR'];?>
        <div class="separate1"  align="center">
      <h1 >Confirmation</h1>
      <img class="chefimg" src="assets/img/<?php print $img?>">
       </div>
        <div class="separate2"  align="center">
        	<input type="hidden" value="<?php print $chef; ?>" name="chef">
        	<input type="hidden" value="<?php print $date; ?>" name="date">
        		<div >
        			<h1 class="title" >Confirmation</h1>
        			<div class="fill" ></div>
          			<p class="font">
      					<?php  echo $chef." will serve you in ".$date."<br>Your Contact Info: <br>Name: ".str_replace("'", "", $username)."<br>Email: ".str_replace("'", "", $email)."<br>Phone: ".str_replace("'", "", $phone);?>
      				</p>
      			</div>
      			<div class="button" align="center">
        			<button class="btn btn-large btn-primary" type="submit">Confirm</button>
        			<a href="index.php">Home page</a>
        		</div>
        </div>

      

      </form>
      

    </div> <!-- /container -->

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

  </body>
</html>
