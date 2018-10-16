<?php

	//	Defining a method (a function within a class) -

	class Cars {
		function greeting(){

		}
		function greeting2(){

		}
	}

	//	This will display all the methods within a Class

	$the_methods = get_class_methods('Cars');

	foreach ($the_methods as $method) {
		echo $method . "<br/>";
	}

?>
