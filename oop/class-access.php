<?php

	//	Class Access control modifiers (Public, Private & Protected)

	class Car {

		//	Writing 'public' instead of 'var' means the variable can be used outside the class as well.

		public $wheel_count = 4;

		//	Writing 'private' means the variable is only accessable within the one class

		private $door_count = 4;

		//	Writing 'protected' means the variable is only accessable within the class or any  classes that inherit vatiables via extends

		protected $seat_count = 4;

		//	Function containing all 3 within the class

		function car_details(){
			echo $this->wheel_count . "<br/>";
			echo $this->door_count . "<br/>";
			echo $this->seat_count . "<br/>";
		}
	}

	$bmw = new Car();

	// Of the three echo's below, only the first echo attempt will work, as the wheel_count variable is set to public

	//	echo $bmw->wheel_count . "<br/>";
	//	echo $bmw->door_count . "<br/>";
	//	echo $bmw->seat_count . "<br/>";

	// This will display all three variables (as the function being echoed are contained inside the Car class)

	echo $bmw->car_details();

?>
