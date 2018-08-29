<form class="" action="" method="post">
	<div class="form-group">

		<?php

			//	This code is for editing the cat_title of a cateogry in the DB.
			//	This works by checking if the GET (URL value is set)
			//	If set, a query to the db matching the get value is issued.
			//	The code then Fetches for the category id and TITLE.
			//	A while loop then triggers, where the cat id and title are assigned to variables.
			//	Form fields are then triggered ( placed in-between the whileloop)
			//	The cat_title is echoed into the edit field.

			//	(USUALLY THIS WOULD LOAD A NEW ADMIN PAGE IN WORDPRESS, WHERE YOU COULD THEN EDIT THE NAME IN A  FIELD)

			if(isset($_GET['edit'])){
				$cat_id = $_GET['edit'];

			$query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
			$select_all_category_id = mysqli_query($connection,$query);
			while($row = mysqli_fetch_array($select_all_category_id)){
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
			?>

		<label for="cat_title">Edit Category Name:</label>
		<input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;} ?>">

		<?php
	}}

		?>

		<?php

		//	Once the cat_title is in the edit field, the code needs to write to the DB.
		//	An if statment for when the update Category button is set gets triggered first.
		//	We then use $_POST to send the new cat tile in the text field to the DB.
		//	We Update the categori table to somthing news, based on the id value matching.
		//	The previous php code then refreshes, and loads the new category name in the html table.

		if(isset($_POST['update_Category'])){
			$cat_title_update = $_POST['cat_title'];
			$query = "UPDATE categories SET cat_title = '$cat_title_update' WHERE cat_id = {$cat_id}";
			$update_query = mysqli_query($connection,$query);
		}
		?>

	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update_Category" value="Update Category Name">
	</div>
</form>
