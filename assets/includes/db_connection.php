<?php 

require_once 'credentials.inc.php';

if(session_id() == "" || empty($_SESSION)){
	session_start();
	if(empty($_SESSION['output'])){
		$_SESSION['output'] = "";
	}
	if(empty($_SESSION['output1'])){
		$_SESSION['output1'] = "";
	}
	if(empty($_SESSION['output3'])){
		$_SESSION['output3'] = "";
	}
	if(empty($_SESSION['outputR'])){
		$_SESSION['outputR'] = "";
	}
	if(empty($_SESSION['PHP_AUTH_TYPE'])){
		$_SESSION['PHP_AUTH_TYPE'] = "guest";
	}
}



try{
	$pdo = new PDO('mysql:host=' . $dbHost .'; dbname=' . $dbName, $dbUsername, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}

catch(PDOException $e){
	//$SESSION_['output'] = 'Unable to connect to database ' . $e->getMessage();
	//include 'output.html.php';
	echo "erro";
	$pdo = null;
	exit();
}

function mysql_fix_string($pdo, $string){
	if(get_magic_quotes_gpc()){
		$string = stripslashes($string);
	} 
	return $pdo->quote($string);
}

function hashPass($pdo, $password){
	$salt = "MySaltThatUsesALongAndImpossibleToRememberSentence+NumbersSuch@7913";
	$hash = hash_hmac('md5', $password, $salt);
	return $hash;
}



?>