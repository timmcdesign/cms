<?php

	//	Defining a class -

	class Cars {

	}

	//	This will display all the default defined Classes + our new Class 'Cars'

	$my_Class = get_declared_classes();

	foreach ($my_Class as $class) {
		echo $class . "<br/>" ;
	}

?>
