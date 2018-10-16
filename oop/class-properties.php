<?php

	//	Creating properties (Variables inside classes)
	//	Variables inside classes need to be defined specifically

	class Cars {

		//	Defiining variables in OOP

		var $door_count = 4;
		var $wheel_count = 4;

		//	Defiining functions in OOP (containing Variables)

		function car_details(){
			return "This car has " . $this->wheel_count . " wheels and " . $this->door_count . " doors.";
		}

	}

	//	Creating two Car Objects

	$bmw = new Cars();
	$vw = new Cars();

	//	Calling Variable in OOP

	echo $bmw->wheel_count . "<br/>";

	//	Calling a Variable and re-defining it, in OOP

	echo $bmw->door_count = 5 . "<br/>";

	//	Calling Functions in OOP

	echo $vw->car_details();

?>
