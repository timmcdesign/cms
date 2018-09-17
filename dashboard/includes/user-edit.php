<?php
	//	Pulling the data from the DB and turning them into variables so they can be put into the edit form

	if(isset($_GET['user'])){
		$the_user_id = $_GET['user'];
	}

	$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
	$select_users_by_id = mysqli_query($connection,$query);

	while($row = mysqli_fetch_array($select_users_by_id)){
		$user_name = $row['user_name'];
		$user_first_name = $row['user_first_name'];
		$user_last_name = $row['user_last_name'];
		$user_email = $row['user_email'];
		$user_role = $row['user_role'];
		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
	}

	//	This will trigger the new field data in the form to replace and update with the newly enetered data.

	if(isset($_POST['update_user'])){
		$user_name = $_POST['username'];
		$user_first_name = $_POST['first_name'];
		$user_last_name = $_POST['last_name'];
		$user_email = $_POST['email'];
		$user_role = $_POST['role'];
		$user_image = $_FILES['image']['name'];
		$user_old_image = $_POST['old-image'];
		$user_image_temp = $_FILES['image']['tmp_name'];

		move_uploaded_file($user_image_temp, "../images/$user_image");	//	Function that updates a file from temp to server

		//	This code tells the image file field, that if no image is being updated, keep the same image.
		//	By default, if the fiel field is empty, it will tell the DB to replace the existing image with noting.
		//	The empty function is used to Determine whether a variable is empty.

		/* if(empty($user_image)){
		$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
			$select_image = mysqliquery($connection, $query);
			while ($row = mysqli_fetch_array($select_image)) {
				$user_image = $row['user_image'];
			}
		}*/

		//	Saving the image as a session or a hidden input in a form are better solutions tocalling back to the DB for the image again
		//	This is a very basic solution - if field is empty, old image = user image

		if(empty($user_image)){
			$user_image = $user_old_image;
		}

		//	This is the query - Each data field in the row listed and then updated based on ID

		$query = "UPDATE users SET
		user_name = '{$user_name}',
		user_first_name = '{$user_first_name}',
		user_last_name = '{$user_last_name}',
		user_email = {$user_email},
		user_role = '{$user_role}',
		user_image = '{$user_image}'
		WHERE user_id = {$the_user_id}";

		$update_user = mysqli_query($connection, $query);
}?>

<div class="col-lg-9 admin-header">
	<h1 class="page-header">Edit Post</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>
	<form class="create-user-form" action="" method="user" enctype="multipart/form-data">
	<!--  The enctype attribute above specifies how form-data should be encoded when submitted to your server  -->

	<?php

	//	Message shown if page does updates

	if(isset($_POST['update_user'])){?>
		<div class="alert alert-success" role="alert">Post Successfully Updated</div>
	<?php
	}?>

	<!--  Here is the form  -->

	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="first_name">First Name:</label>
			<input class="form-control" type="text" name="first_name" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="last_name">Last Name:</label>
			<input class="form-control" type="text" name="last_name" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="username">Username:</label>
			<input class="form-control" type="text" name="username" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
		<label for="user_role">Role:</label>

			<?php

				//	Query to create dropdown of potential user roles

				$query = "SELECT * FROM users";
				$select_users = mysqli($connection, $query);

				confirmConnection($select_users);

				while($row = mysqli_fetch_array($select_users)){
					$user_id = $row['user_role'];
					$user_role = $row['user_role'];
				}

			 ?>

			<select name="user_role" id="" style="width:100%; height: 34px;">
				<option value="admin">Admin</option>
				<option value="editor">Editor</option>
				<option value="subscriber">Subscriber</option>
			</select>

		</div>
	</div>
	<div class="clearfix"></div>
	<hr />
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="email">Email:</label>
			<input class="form-control" type="email" name="email" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="user_title">Confirm Email:</label>
			<input class="form-control" type="email" name="confirm_email" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
	<div class="form-group">
		<label for="user_title">Password:</label>
		<input class="form-control" type="password" name="password" value="">
	</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
	<div class="form-group">
		<label for="user_title">Confirm Password:</label>
		<input class="form-control" type="password" name="confirm_password" value="">
	</div>
	</div>
	<div class="clearfix"></div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Create User">
	</div>
</form>
