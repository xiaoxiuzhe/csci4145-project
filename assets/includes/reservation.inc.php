<?php require_once './db_connection.php'; ?>


<?php 

	//make sure user made selection
	if(isset($_POST['chef']) && isset($_POST['date'])){
		
		$chef = mysql_fix_string($pdo, $_POST['chef']);
		$date = $_POST['date'];
		
		//save user information stored in SESSION variable
		$username = $_SESSION['PHP_AUTH_USER'];
		$useremail = $_SESSION['email'];
		$userphone = $_SESSION['phone'];
		
		//echo $chef. " on " . $date . " for " .$username;
		
		//create reservation
		createReservation($pdo, $chef, $date, $username, $useremail, $userphone);
		
	}else{
		
		echo "Please make a selection";
		
	}
	
	
	
	/*
		make a reservation
	*/
	function createReservation($pdo, $chef, $date, $username, $useremail, $userphone){
		
		try{
			$addReservation = $pdo->prepare('INSERT INTO reservations (id, username, useremail, userphone, chef, date) VALUES (?, ?, ?, ?, ?, ?)');
			$addReservation->execute(array(null,$username, $useremail, $userphone, $chef, $date));
			//echo "reserved";
			//$_SESSION['outputR'] = "A new reservation has been created";
			$_SESSION['chef'] = str_replace("'", "", $chef);
			$_SESSION['date'] = $date;
			header("Location: ../../confirmed.php");
		}
			catch(PDOException $e){
			$error = "Error creating reservation" . $e->getMessage();
			$_SESSION['outputR'] = $error;
			echo $error;
			//header("Location: ../../signup.php");
		}
		
		
	}

	

?>

