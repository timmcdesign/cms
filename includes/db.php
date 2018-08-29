<?php

	//	The best way to connect to a DB is to turn your connection variables into constants.
	//	This will make your username and password fields static and prevent them from being over written.
	//	How ever if the connection file is public facing, then your fired...

	//	Edwin actually suggests putting the constants into an array,
	//	and uses a functon that capitalizes the constant values

$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "H951vXQ3grP1MWfM";
$db["db_name"] = "cms";

foreach($db as $key => $value){

define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/*	Standard way to define consants that connect to a DB

define ("DB_HOST", "localhost");
define ("DB_USER", "root");
define ("DB_PASS", "H951vXQ3grP1MWfM");
define ("DB_NAME", "cms");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connection){

	echo "Connected";

}

*/

/*	Default way of connecting to DB

$connection = mysqli_connect('localhost','root','sw55tnes','cms');

*/

 ?>
