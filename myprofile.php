<?php 
require_once 'assets/includes/db_connection.php'; 
if(!isset($_COOKIE[session_name()])){
	session_start();
	$_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
}
else{
	//session_start();
	if($_SESSION['HTTP_USER_AGENT'] != $_SERVER['HTTP_USER_AGENT']){
		$_SESSION['output1'] = "Please login to see my profile";
		header("Location: signin.php");
	}

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
    function editPassword(){
    	document.getElementById("passwordField").style.display="table-row";
    	document.getElementById("passwordField1").style.display="table-row";
    	document.getElementById("pbutton").style.display="none";
    	return true;
    }
</script>
    <meta charset="utf-8">
    <title>My profile</title>
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
        max-width: 600px;
        height: 350px;
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
      .separate{
      	height: 250px;	
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
      <form class="form-signin" action="assets/includes/edit.inc.php"  method="post">
        <?php 
			
        ?>	
        <h2 class="form-signin-heading"><?php print str_replace("'","",$_SESSION['PHP_AUTH_USER']);?>'s profile</h2>
        <?php echo $_SESSION['output3'];?>
        <table max-width="559" border="1" cellpadding="5" cellspacing="0">
        <tr>
        <td>Username: </td>
        <td ><?php print str_replace("'", "", $_SESSION['PHP_AUTH_USER']); ?></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td ><input type="txt"  value="<?php print str_replace("'", "", $_SESSION['email']); ?>" name="email"></td>
          </tr>
          <tr>
            <td>Phone: </td>
            <td ><input type="txt"  value="<?php print str_replace("'", "", $_SESSION['phone']); ?>" name="phone"></td>
          </tr>
          <tr id="passwordField" style="display:none;">
            <td>New Password: </td>
            <td ><input type="password" value="" name="password"  id="txtPassword"></td>
          </tr>
          <tr id="passwordField1" style="display:none;">
            <td>Confirm Password: </td>
            <td ><input type="password" value="" name="confirmpassword"  id="txtConfirmPassword"></td>
          </tr>
         
        </table>
        <button id="pbutton" class="btn btn-large btn-primary" type="button" onclick="return editPassword()">Change password</button>
        <button class="btn btn-large btn-primary" type="submit" onclick="return Validate()">Update</button>
        <?php if($_SESSION['PHP_AUTH_TYPE'] != "admin"){
        	echo '<button style="float:right" class="btn btn-large btn-primary" type="button" onclick="{location.href=\'assets/includes/delete.inc.php\'}">Delete account</button>';
        }
        	?>
        <a href="index.php">Home page</a>
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
