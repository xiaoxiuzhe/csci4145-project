<?php
require_once './db_connection.php';
$username = $_SESSION['PHP_AUTH_USER'];
$email = mysql_fix_string($pdo, $_POST['email']);
$phone = mysql_fix_string($pdo, $_POST['phone']);
$password = mysql_fix_string($pdo, $_POST['password']);
$confirmPassword = mysql_fix_string($pdo, $_POST['confirmpassword']);

$hashedPassword = hashPass($pdo, $password);

if(allFieldsFilledIn()){
	if(passwordsMatch($password, $confirmPassword)){
		updateUser($pdo, $username, $email, $phone,$_POST['password'], $hashedPassword);
	}
}


function allFieldsFilledIn(){

		if(!isset($_POST['email']) || !isset($_POST['phone'])){
			$_SESSION['output3'] = "You missed some info";
			header("Location: ../../myprofile.php");
			return false;
		}
		return true;
	}

function passwordsMatch($password, $confirmPassword){

	if(($password != $confirmPassword)){
		$_SESSION['output3'] = "Both passwords must match";
		header("Location: ../../myprofile.php");
		return false;
	}
	else{
		return true;
	}

}


function updateUser($pdo, $username, $email, $phone, $password,$hashedPassword){

	//check if table exists, create one if not
	//checkTableExistence($pdo);

	//add user
	try{
		$updateEmail = $pdo->prepare("UPDATE users SET email = :email WHERE username = :username");
		$updateEmail->execute(array(':email'=>$email, ':username'=>$username));
		$_SESSION['email'] = $email;
		
		$updatePhone = $pdo->prepare("UPDATE users SET phone = :phone WHERE username = :username");
		$updatePhone->execute(array(':phone'=>$phone, ':username'=>$username));
		$_SESSION['phone'] = $phone;
		
		if($password!=""){
			$updatePassword = $pdo->prepare("UPDATE users SET password = :password WHERE username = :username");
			$updatePassword->execute(array(':password'=>$hashedPassword, ':username'=>$username));
		}
		
		$_SESSION['output3'] = $_SESSION['PHP_AUTH_USER']." updated.";
		header("Location: ../../myprofile.php");
	}
	catch(PDOException $e){
		$error = "Error update user" . $e->getMessage();
		$_SESSION['output3'] = $error;
		header("Location: ../../myprofile.php");
	}
}




?>


