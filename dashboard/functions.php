<?php

	function confirmConnection($result){
		global $connection;

		if (!$result) {
			die("Error - Connection to DB Failed." . " " . mysqli_error($connection));
		}
	}

	function insertCategories(){

			global $connection;		//	Dont forget that your connection variable needs to be global!!!!

		//	This code is Posting the Category name to the Categories table in the DB
		//	The code also displays if the text field is empty via a warming message.
		//	We are sending just the title, as the ID is incrementaly created in the DB.
		//	And if everything fails, an error is displayed on the screen.

		if(isset($_POST['submit'])){
			$cat_title = $_POST['cat_title'];
			if ($cat_title == "" ){
				echo "<p class='text-danger'>Please try again, category title is invalid";
			}
			else {
				$query = "INSERT INTO categories(cat_title)" . "VALUE ('{$cat_title}')";
				$create_category = mysqli_query($connection,$query);

				if(!$create_category){
					die("<p class='text-danger'>Failed to create category" . " - " . mysqli_error($connection) . "<br>Please refresh and try again</p>");
				}
			}
		}
	}

	function pullCategories(){

		global $connection;

		//	This code is pulling the DB of Categories into a table using a while loop.
		//	It is pulling the Cat ID and Title, turning them into Variables and then placing them in a table.

		$query = "SELECT * FROM categories Limit 20";	//	Here you can set limits for what is displayed
		$select_all_categories = mysqli_query($connection,$query);

		while($row = mysqli_fetch_array($select_all_categories)){
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			echo "<tr>";
			echo "<td>{$cat_id}</td>";
			echo "<td>{$cat_title}</td>";
			echo "<th width='60px'><a class='text-danger' href='categories.php?edit={$cat_id}'>Edit</a></td>";
			echo "<th width='60px'><a class='text-danger' href='categories.php?delete={$cat_id}'>Delete</a></td>";
			echo "</tr>";
		}
	}

	function deleteCategory(){

		global $connection;

			//	This code is for deleting a Category from the DB
			//	Note that we gave a diffrent name for the car_id variable we want to delete

		if(isset($_GET['delete'])){
			$cat_id_delete = $_GET['delete'];
			$query = "DELETE FROM categories WHERE cat_id = {$cat_id_delete} ";
			$delete_query = mysqli_query($connection,$query);

			//	In order for your deleted category to diappear instantly,
			//	you need to trigger the page to reload using php.\
			//	The code below asks to reload a specific page.

			header("Location: categories.php");
		}
	}
 ?>
