<?php

	//	Database Connection Constants
	//	Settings from local db user account

	$db["db_host"] = "localhost";
	$db["db_user"] = "cms";
	$db["db_pass"] = "H951vXQ3grP1MWfM";
	$db["db_name"] = "oop";

	foreach($db as $key => $value){
		//	Turns the array to upper case to match connection syntax
		define(strtoupper($key), $value);
	}

 ?>
