<?php

	//	Database Class Creation
	//	1 - Define Database class

	require_once("config.php");

	class Database{

		//	2 - Make Connection Public so it can be acessed without using glabal for security reasons

		public $connection;

		//	3 - Using construct function to autimaticaly connect to database when Database Class is called

		function __construct(){

			$this->open_db_connection();

		}

		//	4 - Create function that calles the Database class to connect to the DB

		public function open_db_connection(){

			//	5 - Basic php function to connect to mysqli DB using private variable

			$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			//	6 - Adding fallback error code to be written if connection to DB fails

			if(mysqli_connect_errno()){

				die("Database connection failed - " .  mysqli_error());

			}
		}
	}

	//	7 - Creating initial Database Class

	$database = new Database();

 ?>
