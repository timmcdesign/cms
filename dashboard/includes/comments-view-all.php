<div class="col-lg-12 admin-header">
<h1 class="page-header">Comments</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

	<?php if (isset($_GET['delete'])) {
		echo "<div class='alert alert-success' role='alert'>Post Successfully Deleted</div>";}
	?>

	<table class="table table-bordered">

	<thead>
		<tr>
			<th width="40" style="text-align:center;">Id</th>
			<th width="95" style="text-align:center;">Author</th>
			<th style="text-align:left";>Message</th>
			<th width="60" style="text-align:center;">Email Address</th>
			<th>Which Post</th>
			<th width="70" style="text-align:center;">Status</th>
			<th width="90" style="text-align:center;">Date</th>
			<th width="90" style="text-align:center;">Actions</th>
		</tr>
	</thead>

	<tbody>

		<?php

		//	 This is the php that triggers the deletion of a comment in the db and front end of the site

		if (isset($_GET['delete'])) {
			$comment_id = $_GET['delete'];
			$query = "DELETE FROM comments WHERE comment_id = $comment_id";
			$delete_comment_query = mysqli_query($connection, $query);
			header("location:comments.php");

			//	This query will incrementaly decrease the comment count each time a comment is deleted
			//	This will need to be replicated for creating comments

			//		$query = "UPDATE post SET post_comment_count = post_comment_count - 1 WHERE post_id = $the_post_id";
			//		$update_comment_count = mysqli_query($connection,$query);

			}

		//	 This is the php that triggers the approval of a comment in the db and front end of the site

		if (isset($_GET['approve'])) {

			$comment_id = $_GET['approve'];
			$query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $comment_id";
			$approve_comment_query = mysqli_query($connection, $query);
			header("location:comments.php");
		}

		//	 This is the php that triggers the rejection of a comment in the db and front end of the site

		if (isset($_GET['reject'])) {

			$comment_id = $_GET['reject'];
			$query = "UPDATE comments SET comment_status = 'Rejected' WHERE comment_id = $comment_id";
			$reject_comment_query = mysqli_query($connection, $query);
			header("location:comments.php");
		}

		?>

		<?php

		//	Pulling the data from the DB to the table on the Add Posts page.

		$query = "SELECT * FROM comments";
		$select_comments = mysqli_query($connection,$query);

		while($row = mysqli_fetch_array($select_comments)){
			$comment_id = $row['comment_id'];
			$comment_post_id = $row['comment_post_id'];
			$comment_author = $row['comment_author'];
			$comment_content = substr($row['comment_content'],0,50);
			$comment_email = $row['comment_email'];
			$comment_status = $row['comment_status'];
			$comment_date = $row['comment_date'];

			echo "<tr>";
			echo "<td style='text-align:center;'>$comment_id</td>";
			echo "<td>$comment_author</td>";

			// Query to pull the category name instead of category number

			/* $query = "SELECT * FROM categories WHERE cat_id = $comment_category ";
			$select_all_category_id = mysqli_query($connection,$query);
			while($row = mysqli_fetch_array($select_all_category_id)){
				$cat_id = $row['cat_id'];
				$cat_content = $row['cat_content'];
			} */

			echo "<td style='text-align:left;'>$comment_content</td>";
			echo "<td style='text-align:left;'><a href='mailto:$comment_email?subject=Response to Comment'>$comment_email</a></td>";

			// This is PHP that pulls the name of the post the comment is in - using the post_comment_id
			// Included is an statment, that will let users know if the comment is redundant, based on the post_id being missing in the DB (deleted)

			$query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
			$select_post_id_query = mysqli_query($connection, $query);

				while($row = mysqli_fetch_array($select_post_id_query)){
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
				}
				if(!$post_id){
					$post_title = 'No longer exists';
					echo "<td style='color:#bbb;'>$post_title</td>";
				}
				else {
					echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
				}

			echo "<td width='100' style='text-align:center;'>$comment_status</td>";
			echo "<td width='105' style='text-align:center';>$comment_date</td>";
			echo "<th width='190' style='text-align:center';>
			<a class='text-success' onclick='return approveConfirmation()' href='comments.php?approve={$comment_id}'>Approve</a>&nbsp;&nbsp;
			<a class='text-warning' onclick='return rejectConfirmation()' href='comments.php?reject={$comment_id}'>Reject</a>&nbsp;&nbsp;
			<a class='text-danger' onclick='return deleteConfirmation()' href='comments.php?delete={$comment_id}'>Delete</a></td>";
			echo "</tr>";
		}

		 ?>
	</tbody>
</table>
