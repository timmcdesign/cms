<?php

	//	Constructors and Destructors

	class Car {

		//	Variable set

		public $wheel_count = 4;

		static $door_count = 4;

		//	Normal function echoing the variable

		function details(){
			echo $this->wheel_count . "<br/>";
		}

		//	A constructor will automaticly execute the code within a function (if a object class is called ie: Car)

		function __construct(){
			echo $this->wheel_count . "<br/>";
			//	This echo will increment the variable each time a class is called - used to add things
			echo self::$door_count++ . "<br/><br/>";
		}

		//	A destructor is the is the opposite - used to remove things

		function __destruct(){
			echo $this->wheel_count . "<br/>";
			//	This echo will incrementally drecrease the variable each time a class is called - used to remove things
			echo self::$door_count-- . "<br/><br/>";
		}
	}

	//	Executing the functions

	$bmw = new Car;		// Constructor will trigger by creating the car object
	$bmw = new Car;		// Constructor will trigger by creating the car object
	$bmw = new Car;		// Constructor will trigger by creating the car object

	//bmw->details();	// Regular function triggers by being called

?>
