<?php

	//	User Class Creation

	//	1 - Define User class
	require_once("new_config.php");

	class User{

		//	2 - Creating a function that 
		public function find_all_users() {
			global $database_handler;
			$result_set = $database_handler->query("SELECT * FROM users");
			return $result_set;
		}

	}

	$user_handler = new User();

 ?>
