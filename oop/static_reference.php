<?php

	class Car {

		//	Static varaible set inside Cars

		static $wheel_count = 4;

		//	Static varaible is set a static function

		static function car_detail(){

			return self::$wheel_count . "<br/>";
		}
	}

	//	Truck is extended from Cars

	class Truck extends Car{

		//	A new static function is created inside truck calling the static function in the other class using 'parent'

		static function display(){

			echo parent::car_detail();

		}
	}

	//	Calling the Truck Static function, which is inheriting the Cars static function

	Truck::display();
?>
