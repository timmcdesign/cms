<?php

	//	Getters and Setters - Unique functions that enable you to use private variables

	class Car {

		private $wheel_count = 4;

		//	Get allows you to pull private variables

		function get_values(){
			echo $this->wheel_count . "<br/>";
		}

		//	Set allows you to re-define private variables

		function set_values(){
			echo $this->wheel_count = 5 . "<br/>";
		}

	}

	$bmw = new Car();

	//	Examples

	echo $wheel_count . "Will not show" . "<br/>";

	$bmw->get_values();

	$bmw->set_values();
