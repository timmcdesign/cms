<?php

	//	Creating properties / attributes for classes

	class Cars {
		var $wheel_count;

		function greeing(){
			echo "Helo";
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
