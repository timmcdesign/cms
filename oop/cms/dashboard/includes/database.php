<?php
	//	Database Class Creation

	//	1 - Define Database class
	require_once("new_config.php");
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

	//	7 - Creating a query function to use for future classes - Public using mysqli_query and returning the result

	public function query($query) {
		$result = mysqli_query($this->connection, $query);
		return $result;
	}

	// 8 - Creati ng a query to confirm query connection

	private function confirm_query($result){
		if(!$result){
			die("Query Failed") . mysqli_error();
		}
	}

	// 9 - Escape string function

	public function escape_string($string){
		$escaped_string = mysqli_real_escape_string($this->connection, $string);
		return $escaped_string;
	}

	}
	//	10 - Creating initial Database Class

	$dbh = new Database();

 ?>
