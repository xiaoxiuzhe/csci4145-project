<?php 
require_once 'db_connection.php'; 


$username = $_SESSION['PHP_AUTH_USER'];
		if($_SESSION['PHP_AUTH_TYPE'] != "admin"){
			$sql = 'SELECT * FROM reservations WHERE username=:username' ;// WHERE username=:username
		}
		else{
			$sql = 'SELECT * FROM reservations' ;
		}
		$findOrder = $pdo->prepare($sql);
		$findOrder->execute(array(':username'=>$username));
		
		$row = $findOrder->fetchAll();
		/*$index=0;
		while(!empty($row[$index]['username'])){
			echo $row[$index]['username']." ";
			echo $row[$index]['useremail']." ";
			echo $row[$index]['userphone']." ";
			echo $row[$index]['chef']." ";
			echo $row[$index]['date']."<br>";
			$index=$index+1;
		}
		echo "done";
		*/


?>
