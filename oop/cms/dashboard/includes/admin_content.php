<?php

$query = "SELECT * FROM users WHERE id='1' ";

//	$database = " ";

$result = $database->query($query);

$user_found = mysqli_fetch_array($result);

echo $user_found['username'];

?>
