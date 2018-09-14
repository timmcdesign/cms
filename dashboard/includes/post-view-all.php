<div class="col-lg-12 admin-header">
<h1 class="page-header">Post</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

	<?php if (isset($_GET['delete'])) {
		echo "<div class='alert alert-success' role='alert'>Post Successfully Deleted</div>";}
	?>

	<table class="table table-bordered">

	<thead>
		<tr>
			<th width="40" style="text-align:center;">Id</th>
			<th width="95" style="text-align:center;">Author</th>
			<th>Title</th>
			<th width="125" style="text-align:center;">Category</th>
			<th width="60" style="text-align:center;">Status</th>
			<th width="125" style="text-align:center;">Featured Image</th>
			<th width="80" style='text-align:center;'>Tags</th>
			<th width="95" style="text-align:center;">Comments</th>
			<th width="90" style="text-align:center;">Date</th>
		</tr>
	</thead>

	<tbody>

		<?php

		//	 This is the php that triggers the Delete link to delete the post form the post table in the db
		if (isset($_GET['delete'])) {
			$post_id = $_GET['delete'];
			$query = "DELETE FROM posts WHERE post_id = $post_id";

			$delete_query = mysqli_query($connection, $query);
		}

		//	 This is the php that triggers the Edit link to delete the post form the post table in the db
		if (isset($_GET['edit'])) {

			$post_id = $_GET['edit'];
			$query = "UPDATE * WHERE post_id = $post_id";

			$edit_query = mysqli_query($connection, $query);
		}

		 ?>

		<?php

		//	Pulling the data from the DB to the table on the Add Posts page.

		$query = "SELECT * FROM posts";
		$select_posts = mysqli_query($connection,$query);

		while($row = mysqli_fetch_array($select_posts)){
			$post_id = $row['post_id'];
			$post_author = $row['post_author'];
			$post_title = $row['post_title'];
			$post_category = $row['post_category_id'];
			$post_status = $row['post_status'];
			$post_image = $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_comments = $row['post_comments'];
			$post_date = $row['post_date'];

			echo "<tr>";
			echo "<td style='text-align:center;'>$post_id</td>";
			echo "<td>$post_author</td>";
			echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

			// Query to pull the category name instead of category number

			$query = "SELECT * FROM categories WHERE cat_id = $post_category ";
			$select_all_category_id = mysqli_query($connection,$query);
			while($row = mysqli_fetch_array($select_all_category_id)){
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
			}

			echo "<td style='text-align:center;'>$cat_title</td>";
			echo "<td style='text-align:center;'>$post_status</td>";
			echo "<td align='center'><a href='../images/$post_image' target='_blank'>View Image</a></td>";
			// <img src='../images/$post_image' width='auto' style='max-width:180px;' class='img-responsive' alt='$post_image'/ >
			echo "<td style='text-align:center;'>$post_tags</td>";
			echo "<td style='text-align:center;'>$post_comments</td>";
			echo "<td width='95' style='text-align:center';>$post_date</td>";
			echo "<th width='45'><a class='' href='posts.php?source=edit_post&post=${post_id}'>Edit</a></td>";
			echo "<th width='60'><a class='text-danger' onclick='return deleteConfirmation()' href='posts.php?delete={$post_id}'>Delete</a></td>";
			echo "</tr>";
		}

		 ?>
	</tbody>
</table>
