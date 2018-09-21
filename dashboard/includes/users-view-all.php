<div class="col-lg-12 admin-header">
<h1 class="page-header">Users</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

	<?php

	//	GUI Notification If Statments
	if(isset($_GET['source'])) {
		if($_GET['source'] == 'delete'){
			echo "<div class='alert alert-success' role='alert'>User Successfully Deleted</div>";
		}
		else if($_GET['source'] == 'admin'){
			echo "<div class='alert alert-success' role='alert'>User Role Successfully Changes to Admin</div>";
		}
		else if($_GET['source'] == 'editor'){
			echo "<div class='alert alert-success' role='alert'>User Role Successfully Changes to Editor</div>";
		}
		else if($_GET['source'] == 'subscriber'){
			echo "<div class='alert alert-success' role='alert'>User Role Successfully Changes to Subscriber</div>";
		}
	}

	?>

	<table class="table table-bordered">

	<thead>
		<tr>
			<th width="75" style="text-align:center;">User ID:</th>
			<th>Username:</th>
			<th>Full Name:</th>
			<th>Email:</th>
			<th width="120" style="text-align:center;">Role:</th>
			<th width="120" style="text-align:center;">Date Created:</th>
			<th width="315" style="text-align:center;">Actions</th>
		</tr>
	</thead>

	<tbody>

	<?php

	//	 This is the php that triggers the Delete link to delete the user form the user table in the db

	if(isset($_GET['source'])) {
		if($_GET['source'] == 'delete'){
			$the_user_id = $_GET['user_id'];
			$query = "DELETE FROM users WHERE user_id = $the_user_id";
			$delete_user_query = mysqli_query($connection, $query);
		}

		//	 This is the php that triggers the Edit link to delete the user form the user table in the db

		else if($_GET['source'] == 'edit'){
			$the_user_id = $_GET['user_id'];
			$query = "UPDATE * WHERE user_id = $the_user_id";
			$edit_query = mysqli_query($connection, $query);
		}

		//	 Setting user role to admin query

		else if($_GET['source'] == 'admin'){
			$the_user_id = $_GET['user_id'];
			$query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
			$set_role_admin_query = mysqli_query($connection, $query);
		}

		//	 Setting user role to editor query

		else if($_GET['source'] == 'editor'){
			$the_user_id = $_GET['user_id'];
			$query = "UPDATE users SET user_role = 'editor' WHERE user_id = $the_user_id";
			$set_role_edit_query = mysqli_query($connection, $query);
		}

		//	 Setting user role to subscriber query

		else if($_GET['source'] == 'subscriber'){
			$the_user_id = $_GET['user_id'];
			$query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
			$set_role_edit_query = mysqli_query($connection, $query);
		}
	}

	?>

	<?php

		//	Pulling the data from the DB to the table on the Add Posts page.

		$query = "SELECT * FROM users";
		$select_users = mysqli_query($connection,$query);

		while($row = mysqli_fetch_array($select_users)){
			$user_id = $row['user_id'];
			$user_name = $row['user_name'];
			$user_password = $row['user_password'];
			$user_first_name = $row['user_first_name'];
			$user_last_name = $row['user_last_name'];
			$user_email = $row['user_email'];
			$user_image = $row['user_image'];
			$user_role = $row['user_role'];
			$user_date_created = $row['user_date_created'];

			echo "<tr>";
			echo "<td style='text-align:center;'>$user_id</td>";
			echo "<td>$user_name</td>";
			echo "<td>
				<table>
					<tr>
						<td width='30px'>
							<a href='../images/$user_image' target='_blank'><img src='../images/$user_image' width='19' height='19' alt='$user_image'/ ></a>
						</td>
						<td>
							$user_first_name $user_last_name
						</td>
					</tr>
				</table>
				</td>";
			echo "<td><a href='mailto:$user_email?subject=Email to User'>$user_email</a></td>";
			echo "<td style='text-align:center;'>$user_role</td>";
			echo "<td style='text-align:center;'>$user_date_created</td>";
			echo "<th style='text-align:center';>
			<a onclick='return adminConfirmation()' href='users.php?source=admin&user_id={$user_id}'>Admin</a>&nbsp;&nbsp;
			<a onclick='return editorConfirmation()' href='users.php?source=editor&user_id={$user_id}'>Editor</a>&nbsp;&nbsp;
			<a onclick='return subscriberConfirmation()' href='users.php?source=subscriber&user_id={$user_id}'>Subscriber</a>&nbsp;&nbsp;
			<a onclick='return' href='users.php?source=edit&user_id={$user_id}'>Update</a>&nbsp;&nbsp;
			<a onclick='return deleteConfirmation()' class='text-danger' href='users.php?source=delete&user_id={$user_id}'>Delete</a>
			</td>";
			echo "</tr>";
		}

		 ?>
	</tbody>
</table>
