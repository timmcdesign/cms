<?php

	//	Static Modifiers
	//	This is a way of ensuring a variable and functions dont change / get effected by other vriables / functions

	class Car {

		//	A static modifier is attached to a class, and defined like a private variable

		static $wheel_count = 4;
		static $door_count = 4;

		//	A static modifier is attached to function the same way.
		//	The Class must be called next to the static variable you want to use.

		static function car_detail(){
			echo "This car has " . CAR::$wheel_count . " wheels and " . Car::$door_count . " doors.";
		}

	}

	$bmw = new Car();

	//	THIS WILL NOT WORK FOR A STATIC VARIABLE

	echo $bmw->door_count . "This will not show" . "<br/>";

	//	Static variables must be called this way

	echo Car::$door_count . "<br/>";

	//	Static functions must be called with the Classname as well

	Car::car_detail();
?>
