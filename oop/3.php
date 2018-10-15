<?php

	//	Instantiating a Class - Creating diffrent instances of classes
	//	The Car class is like a template, like a website theme - Essentialy diffrent options

	class Cars {

		function greeting(){
			echo "Hello there" . "<br/>";
		}
	}

	//	This creates 3 new objects that have been assigned to variables

	$bmw = new Cars();
	$vw = new Cars();
	$audi = new Cars();

	//	This is triggering the method within the class to be displayed

	$bmw->greeting();
	$vw->greeting();
	$audi->greeting();

?>
