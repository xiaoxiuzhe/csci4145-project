<?php 
require_once 'assets/includes/db_connection.php'; 
//require 'assets/includes/reservation.inc.php';
if(!isset($_COOKIE[session_name()])){
	session_start();
	$_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
}
else{
	//session_start();
	if($_SESSION['HTTP_USER_AGENT'] != $_SERVER['HTTP_USER_AGENT']){
		$_SESSION['output1'] = "Please login before checking your order";
		header("Location: signin.php");
	}

}
include 'assets/includes/order.inc.php';
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
      @media (max-width: 979px) {
      
      }
      
       @media (max-width: 767px) {
      	.form-signin {
      		height:500px;
      
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
      <div class="form-signin" >
      <h1 align="center">Order</h1>
      <div  style="height:400px;width:100%;overflow:auto">
      <table align="center"cellspacing="5" cellpadding="8">

<tr>
<td align="left"><b>ID</b></td>

<td align="left"><b>Username</b></td>

<td align="left"><b>Email</b></td>

<td align="left"><b>Phone</b></td>

<td align="left"><b>Chef</b></td>

<td align="left"><b>Date</b></td>

</tr>

<?php 
$index=0;
while(!empty($row[$index]['username'])){
	$id = $row[$index]['id'];
	$username = str_replace("'",'', $row[$index]['username']);
	$useremail = str_replace("'",'', $row[$index]['useremail']);
	$userphone = str_replace("'",'', $row[$index]['userphone']);
	$chef = str_replace("'",'', $row[$index]['chef']);
	$date = str_replace("'",'', $row[$index]['date']);
	
	echo ' <form action="assets/includes/deleteOrder.inc.php" method="post">
			<input type="hidden" value="'.$id.'" name="id">
			<tr><td align="left">' .
			
			$id. '</td><td align="left">' .
			
			$username. '</td><td align="left">' .
			
			$useremail. '</td><td align="left">' .
		
			$userphone. '</td><td align="left">' .
			
			$chef. '</td><td align="left">' .
			
			$date. '<button class="btn btn-Small btn-primary" style="position:relative; left:1em;float:right;" type="submit">Delete</button>
			</td><td align="left">' ;

	$index=$index+1;
	echo '</tr></form>';
	

}?>
     </table>
	</div>
	<div align="center">
        <button class="btn btn-large btn-primary"  onclick="location.href = 'index.php'">Home</button>
      </div>
      </div>
      

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
