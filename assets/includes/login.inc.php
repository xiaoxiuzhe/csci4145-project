<?php require_once './db_connection.php'; ?>

<?php 


$username = mysql_fix_string($pdo, $_POST['username']);
$fixedPass = mysql_fix_string($pdo, $_POST['password']);

$password = hashPass($pdo, $fixedPass);

if(allFieldsFilledIn()){
	logIn($pdo, $username, $password);
}


function allFieldsFilledIn(){
	
	foreach($_POST as $key => $value){
		if(empty($value)){
			$_SESSION['output1'] = "You must fill in all fields";
			header("Location: ../../signin.php");
			exit;
		}
	}
	return true;
}

function logIn($pdo, $username, $password){
		
	try{
		$sql = 'SELECT * FROM users WHERE username=:username AND password=:password' ;
		$findUser = $pdo->prepare($sql);
		$findUser->execute(array(':username'=>$username, ':password'=>$password));
		
		$row = $findUser->fetchAll();
		
		if(!empty($row[0]['username']) && !empty($row[0]['password'])){
			
			//$_SESSION['output1'] = "Logged in!";			
			//$_SESSION['PHP_AUTH_PASS'] = $password;
			$_SESSION['PHP_AUTH_USER'] = $row[0]['username'];
			$_SESSION['email'] = $row[0]['email'];
			$_SESSION['phone'] = $row[0]['phone'];
			$username1 = str_replace("'",'', $username);
			if($username1 == 'admin'){
				$_SESSION['PHP_AUTH_TYPE'] = "admin";
			}
			else{
				$_SESSION['PHP_AUTH_TYPE'] = "user";
			}
			$_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];

			
			header("Location: ../../index.php");
		}
		else{
			$_SESSION['output1'] = "Username/Password mismatched";
			header("Location: ../../signin.php");
		}
		
	}
	catch(PDOException $e){
		echo "Could not log in " . $e->getMessage();
	}
	
}

function startSession($username, $password){
	if(!isset($_SERVER['PHP_AUTH_USER'])){
		session_start();
		$_SESSION['PHP_AUTH_USER'] = $username;
		$_SESSION['PHP_AUTH_PASS'] = $password;
		$_SESSION['PHP_AUTH_TYPE'] = "user";
	}
}


?>
