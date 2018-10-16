<?php

	//	Class Inheritance - Giving another class the same variables as another

	class Cars {

		var $wheels = 4;

	}

	//	'extends' will force a class to inherit the same variables as another class

	class Trucks extends Cars {

	}

	$bmw = new Cars();
	$amarok = new Trucks();

	//	The truck is calling the variables wheels, defined in the cars class

	echo $amarok->wheels;

?>
