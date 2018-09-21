<?php

	if(isset($_GET['source']) && $_GET['source'] == 'edit'){

		$the_user_id = $_GET['user_id'];
		$query = "SELECT * FROM users WHERE user_id = " .$the_user_id;
		$select_users = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_users)){
			$user_id = $row['user_id'];
			$user_name = $row['user_name'];
			$user_first_name = $row['user_first_name'];
			$user_last_name = $row['user_last_name'];
			$user_email = $row['user_email'];
			$user_password = $row['user_password'];
			$user_role = $row['user_role'];
			$user_image = $row['user_image'];
		}
	}

	if(isset($_POST['edit_user'])){
		$user_name = $_POST['user_name'];
		$user_first_name = $_POST['user_first_name'];
		$user_last_name = $_POST['user_last_name'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_role = $_POST['user_role'];

		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];

		move_uploaded_file($user_image_temp, "../images/$user_image");

		$query = "INSERT INTO users (user_name, user_first_name, user_last_name, user_email, user_password, user_role, user_image)
		VALUES ('{$user_name}', '{$user_first_name}', '{$user_last_name}', '{$user_email}', '{$user_password}', '{$user_role}', '{$user_image}' ) ";

		$create_user_query = mysqli_query($connection, $query);

		confirmConnection($create_user_query);
	}

?>

<div class="col-lg-9 admin-header">
<h1 class="page-header">Update user</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

<?php if(isset($_POST['edit_user'])) {
		echo "<div class='alert alert-success' role='alert'>User Successfully Updated</div>";
	}
?>

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
			<input class="form-control" type="text" name="user_first_name" value="<?= $user_first_name; ?>">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="user_last_name">Last Name:</label>
			<input class="form-control" type="text" name="user_last_name" value="<?= $user_last_name; ?>">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="user_name">Username:</label>
			<input class="form-control" type="text" name="user_name" value="<?= $user_name; ?>">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
		<label for="user_role">Role:</label>
			<select name="user_role" id="" style="width:100%; height: 34px;">

				<!-- Learn Ternary Logic! - This is an example from Ryan -->

				<option value="admin" <?= ($user_role == 'admin' ? 'selected' : ''); ?>>Admin</option>
				<option value="editor" <?= ($user_role == 'editor' ? 'selected' : ''); ?>>Editor</option>
				<option value="subscriber" <?= ($user_role == 'subscriber' ? 'selected' : 'disabled'); ?>>Subscriber</option>

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
			<input class="form-control" type="email" name="user_email" value="<?= $user_email; ?>">
		</div>
	</div>
	<div class="col-lg-6" style="padding-left:0px;">
		<div class="form-group">
			<label for="password">Password:</label>
			<input class="form-control" type="password" name="user_password" value="<?= $user_password; ?>">
		</div>
	</div>
	<div class="clearfix"></div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
		</div>
</form>
