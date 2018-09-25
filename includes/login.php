<?php include "db.php"; ?>

<?php

	if(isset($_POST['login'])) {

		//	Grabbing login data and setting to variables
		$username = $_POST['username'];
		$password = $_POST['password'];

		//	Cleaning the username,e and passwords via escape string for possible injections
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		//	Query to select user from DB
		$query = "SELECT * FROM users WHERE user_name = '$username'";
		$select_user_query = mysqli_query($connection, $query);

		//	Query Fallback
		if(!$select_user_query){
			die("Query Failed" . ' - ' . mysqli_error($connection));
		}

		//	Loop Where we validate the DB values for login functionality
		while($row = mysqli_fetch_array($select_user_query)){
			$db_user_id = $row['user_id'];
			$db_user_name = $row['user_name'];
			$db_user_first_name = $row['user_first_name'];
		 	$db_user_last_name = $row['user_last_name'];
		 	$db_user_email = $row['user_email'];
		 	$db_user_password = $row['user_password'];
			$db_user_role = $row['user_role'];
		}

		//	Validation Rules
		if($username !== $db_username && $password !== $db_user_password ){
			header("Location: ../index.php");
		}
		else if($username == $db_username && $password == $db_user_password ){
			header('Location: http://www.example.com/');
		}
		//	else{
		//		header("Location: ../index.php");
		//	}

	}

?>
