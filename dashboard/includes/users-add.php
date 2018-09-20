<?php
	if(isset($_POST['create_user'])){
		$user_name = $_POST['user_name'];
		$user_first_name = $_POST['user_first_name'];
		$user_last_name = $_POST['user_last_name'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_role = $_POST['user_role'];
		$user_date_created = date('y-m-d');

		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];

		move_uploaded_file($user_image_temp, "../images/$user_image");

		$query = "INSERT INTO users (user_name, user_first_name, user_last_name, user_email, user_password, user_role, user_image, user_date_created)";
		$query .= " VALUES ('{$user_name}', '{$user_first_name}', '{$user_last_name}', '{$user_email}', '{$user_password}', '{$user_role}', '{$user_image}', '{$user_date_created}') ";

		$create_user_query = mysqli_query($connection, $query);

		confirmConnection($create_user_query);
	}

?>

<div class="col-lg-9 admin-header">
<h1 class="page-header">Add user</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

<form class="create-user-form" action="" method="post" enctype="multipart/form-data">

<!--  The enctype attribute specifies how form-dat	a should be encoded when submitted to your server  -->

	<?php

		//	Message shown if page does update!

		if (isset($_POST['create_user'])) {

	?>

	<div class="alert alert-success" role="alert">User Successfully Created</div>

	<?php

	}

	?>

	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="user_first_name">First Name:</label>
			<input class="form-control" type="text" name="user_first_name" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="user_last_name">Last Name:</label>
			<input class="form-control" type="text" name="user_last_name" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="user_name">Username:</label>
			<input class="form-control" type="text" name="user_name" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
		<label for="user_role">Role:</label>
			<select name="user_role" id="" style="width:100%; height: 34px;">
				<option value="admin">Admin</option>
				<option value="editor">Editor</option>
				<option value="subscriber">Subscriber</option>
			</select>
		</div>
	</div>
	<img src='#' width='auto' style='max-width:19px;' class='img-responsive img-thumbnail' alt=''/ >
		<div class="form-group">
			<label for="user_image">Profile Picture:</label>
			<input class="" type="file" name="image" value="">
		</div>
	<div class="clearfix"></div>
	<hr />
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="user_email">Email:</label>
			<input class="form-control" type="email" name="user_email" value="">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="password">Password:</label>
			<input class="form-control" type="password" name="user_password" value="">
		</div>
	</div>
	<div class="clearfix"></div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" name="create_user" value="Create User">
		</div>
</form>
