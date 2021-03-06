<?php

include "includes/admin-header.php";
include "includes/admin-footer.php";

?>

<script language="JavaScript" type="text/javascript" src="includes/admin-scripts.js"></script>

<body>

	<div id="wrapper">
		<?php
		include	"includes/admin-navigation.php";
		?>
		<div id="page-wrapper">
			<div class="container-fluid">

				<!-- Page Contents -->
				<div class="row">
						<div class="col-lg-12 admin-header">
							<h1 class="page-header">Profile</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

							<?php

							//	GUI Notification If Statments

							$username = '';
							$user_name = '';
							if(isset($_POST['update_profile'])) {
								if($username === $user_name){
									echo "<div class='alert alert-success' role='alert'>Profile has been  Successfully Updated</div>";
								}
							}

							?>
							<?php

							//	First we use the logged in session data to pull the active users data into the update profile form.

							if(isset($_SESSION['user_name'])){
								$username = $_SESSION['user_name'];
								$query = "SELECT * FROM users WHERE user_name = '$username' ";

								$select_user_profile = mysqli_query($connection, $query);

								while($row = mysqli_fetch_array($select_user_profile)){
									$user_id = $row['user_id'];
									$user_name = $row['user_name'];
									$user_password = $row['user_password'];
									$user_first_name = $row['user_first_name'];
									$user_last_name = $row['user_last_name'];
									$user_email = $row['user_email'];
									$user_image = $row['user_image'];
									$user_role = $row['user_role'];
									$user_date_created = $row['user_date_created'];
								}
							}

							//	Then we use the form fields to update the user table
							//	Note: we are using the session username to validate
							// 	Changing the username field will break the mysql_list_process
							//	We would need to update the session username as well and start a new session.

							if(isset($_POST['update_profile'])){
								$user_name = $_POST['user_name'];
								$user_first_name = $_POST['user_first_name'];
								$user_last_name = $_POST['user_last_name'];
								$user_email = $_POST['user_email'];
								$user_password = $_POST['user_password'];
								$user_role = $_POST['user_role'];

								$user_image = $_FILES['user-image']['name'];
								$user_image_temp = $_FILES['user-image']['tmp_name'];
								// $user_old_image = $_POST['user-image-old'];

								move_uploaded_file($user_image_temp, "../images/$user_image");

								//	if(empty($user_image)){
								//		$user_image = $user_old_image;
								//	}

								$query = "UPDATE users SET
								user_name = '{$user_name}',
								user_first_name = '{$user_first_name}',
								user_last_name = '{$user_last_name}',
								user_email = '{$user_email}',
								user_password = '{$user_password}',
								user_role = '{$user_role}',
								user_image = '{$user_image}'
								WHERE user_name = '$username' ";

								$update_user_query = mysqli_query($connection, $query);

								confirmConnection($update_user_query);
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

										<!-- Field has been made read only to prevent update profile from breaking. Could also be set as hidden and form re-structured. -->

										<input class="form-control" type="text" name="user_name" value="<?= $user_name; ?>" readonly>
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
										<input class="" type="file" name="user-image" value="">
										<input class="hidden" type="file" name="user-image-old" value="<?= $user_image; ?>">
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
										<input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
									</div>
							</form>

						</div>

						<!-- Categories Form  -->
						<div class="col-xs-6">
						</div>

						<!-- Categories Form  -->
						<div class="col-xs-6">
						</div>
				</div>
			</div>
		</div>
	</div>
