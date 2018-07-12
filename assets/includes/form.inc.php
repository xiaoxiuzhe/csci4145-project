<?php require_once './db_connection.php'; ?>

<?php 


$username = mysql_fix_string($pdo, $_POST['username']);
$email = mysql_fix_string($pdo, $_POST['email']);
$phone = mysql_fix_string($pdo, $_POST['phone']);
$password = mysql_fix_string($pdo, $_POST['password']);
$confirmPassword = mysql_fix_string($pdo, $_POST['confirmpassword']);

$hashedPassword = hashPass($pdo, $password);


if(allFieldsFilledIn()){
	if(passwordsMatch($password, $confirmPassword)){
			if(checkUsernameTaken($pdo, $username)){
				createUser($pdo, $username, $email, $phone, $hashedPassword);
			}
	}
}	


function allFieldsFilledIn(){
	
	foreach($_POST as $key => $value){
		if(empty($value)){
			$_SESSION['output'] = "You must fill in all fields";
			header("Location: ../../signup.php");
			return false;
		}
	}
	return true;
}

function passwordsMatch($password, $confirmPassword){
	
	if(($password != $confirmPassword)){
		$_SESSION['output'] = "Both passwords must match";
		header("Location: ../../signup.php");
		return false;
	}
	else{
		return true;
	}
	
}

function checkUsernameTaken($pdo, $inputName){
	try{
		$username = $pdo->quote($inputName);
		$sql = 'SELECT * FROM users WHERE username= ' . $username . ';';
		$result = $pdo->query($sql);
		$rowCount = $result->rowCount();
		
		if($rowCount > 0){
			$_SESSION['output'] = "Username already taken.";
			header("Location: ../../signup.php");
			return false;
		}
		else{
			return true;
		}
	}

	catch(PDOException $e){
		$error = 'Error creating user ' . $e->getMessage();
		$_SESSION['output'] = $error;
		header("Location: ../../signup.php");
		exit();
	}
	
}

function createUser($pdo, $username, $email, $phone, $password){
	
	//check if table exists, create one if not
	//checkTableExistence($pdo);
		
	//add user
	try{
		$addUser = $pdo->prepare('INSERT INTO users (id, username, email, phone, password) VALUES (?, ?, ?, ?, ?)');
		$addUser->execute(array(null, $username, $email, $phone, $password));
		$_SESSION['output'] = "User $username created.";
		header("Location: ../../signup.php");
	}
	catch(PDOException $e){
		$error = "Error creating user" . $e->getMessage();
		$_SESSION['output'] = $error;
		header("Location: ../../signup.php");
	}
}

function checkTableExistence($pdo){
	try{
		$checkTableExists = $pdo->query("SHOW TABLES LIKE 'lab4'");
		$tableExists = $checkTableExists->rowCount() > 0;
		
		if(!$tableExists){
			$createTable = "CREATE TABLE lab4 (
			id INT (255) AUTO_INCREMENT,
			first VARCHAR (255),
			last VARCHAR (255),
			username VARCHAR(255),
			password VARCHAR (255))";
			
			$pdo->query($createTable);
		}
	}	
	catch(PDOException $e){		
		$error = "Error creating table" . $e->getMessage();
		$_SESSION['output'] = $error;
		header("Location: ../index.php");
		
		exit();
	}
}




?>


