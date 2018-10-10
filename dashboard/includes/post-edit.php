<?php
	//	Pulling the data from the DB and turning them into variables so they can be put into the edit form

	if(isset($_GET['post'])){
		$the_post_id = $_GET['post'];
	}

	$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
	$select_posts_by_id = mysqli_query($connection,$query);

	while($row = mysqli_fetch_array($select_posts_by_id)){
		$post_id = $row['post_id'];
		$post_author = $row['post_author'];
		$post_title = $row['post_title'];
		$post_content = $row['post_content'];
		$post_category_id = $row['post_category_id'];
		$post_status = $row['post_status'];
		$post_image = $row['post_image'];
		$post_tags = $row['post_tags'];
		$post_comment_count = $row['post_comment_count'];
		$post_date = $row['post_date'];
	}

	//	This will trigger the new field data in the form to replace and update with the newly enetered data.

	if(isset($_POST['update_post'])){

		$post_author = $_POST['author'];
		$post_title = $_POST['title'];
		$post_content = $_POST['content'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['status'];
		$post_image = $_FILES['image']['name'];
		$post_old_image = $_POST['old-image'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_tags = $_POST['tags'];

		move_uploaded_file($post_image_temp, "../images/$post_image");	//	Function that updates a file from temp to server

		//	This code tells the image file field, that if no image is being updated, keep the same image.
		//	By default, if the fiel field is empty, it will tell the DB to replace the existing image with noting.
		//	The empty function is used to Determine whether a variable is empty.

		/* if(empty($post_image)){
		$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
			$select_image = mysqliquery($connection, $query);
			while ($row = mysqli_fetch_array($select_image)) {
				$post_image = $row['post_image'];
			}
		}*/

		//	Saving the image as a session or a hidden input in a form are better solutions tocalling back to the DB for the image again
		//	This is a very basic solution - if field is empty, old image = post image

		if(empty($post_image)){
			$post_image = $post_old_image;
		}

		//	This is the query - Each data field in the row listed and then updated based on ID

		$query = "UPDATE posts SET
		post_author = '{$post_author}',
		post_title = '{$post_title}',
		post_content = '{$post_content}',
		post_category_id = {$post_category_id},
		post_status = '{$post_status}',
		post_image = '{$post_image}',
		post_tags = '{$post_tags}',
		post_date = '{$post_date}'
		WHERE post_id = {$the_post_id}";

		$update_post = mysqli_query($connection, $query);
}?>

<div class="col-lg-12 admin-header">
	<h1 class="page-header">Edit Post</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>
	<form class="create-post-form" action="" method="post" enctype="multipart/form-data">
	<!--  The enctype attribute above specifies how form-data should be encoded when submitted to your server  -->

	<?php

	//	Message shown if page does updates

	if(isset($_POST['update_post'])){?>
		<div class="alert alert-success" role="alert">Post Successfully Updated</div>
	<?php
	}?>

	<!--  Here is the form  -->

	<div class="form-group">
		<label for="post_title">Post Title:</label>
		<input class="form-control" type="text" name="title" value="<?=  $post_title; // Post Title is injected?>">
	</div>
	<div class="form-group">
		<label for="post_content">Content:</label>
		<textarea class="form-control" type="content" name="content" rows="11"><?= $post_content; // Post Content is injected??></textarea>
	</div>
	<label for="post_title">Current Featured Image:</label>
	<img width='auto' style='max-width:180px;' class='img-responsive' src="../images/<?= $post_image; ?>" alt="<?php $post_image // Post Image name is injected??>"><br>
	<div class="form-group">
		<label for="post-image">Upload New Featured Image:</label>
		<input class="" type="file" name="image" value="">
		<input class="" type="hidden" name="old-image" value="<?= $post_image; ?>">
	</div>
	<div class="col-lg-3" style="padding-left:0px;">
	<div class="form-group">
		<label for="post_author">Author:</label>
		<input class="form-control" type="text" name="author" value="<?php echo $post_author; // Post Author is injected??>">
	</div>
	</div>
	<div class="col-lg-3" style="padding-left:0px;">
	<div class="form-group">
		<label for="post_category-id">Category:</label><br>
		<select name="post_category" class="" id="post_category" style="width:100%; height: 34px;">
			<?php

				//	This is where Catagories are linked into the posts.
				//	We pull the category data (id and title), and dispay them in the post_category_id field.
				//	This way, we can assign the category value to the post database table as well.
				//	We use a while loop to load all the categories, and then inject them into the form options.

				$query = "SELECT * FROM categories";
				$select_all_category_id = mysqli_query($connection,$query);
					while($row = mysqli_fetch_array($select_all_category_id)){
						$cat_id = $row['cat_id'];
						$cat_title = $row['cat_title'];

						echo "<option value='{$cat_id}'>{$cat_title}</option>";
					}
			 ?>
		 </select>
	</div>
	</div>
	<div class="col-lg-3" style="padding-left:0px;">
	<div class="form-group">
		<label for="post_tags">Tags:</label>
		<input class="form-control" type="text" name="tags" value="<?php echo $post_tags; // Post tags are injected??>">
	</div>
	</div>
	<div class="col-lg-3" style="padding-left:0px;">
	<div class="form-group">
		<label for="post_status">Status:</label>
		<input class="form-control" type="text" name="status" value="<?php echo $post_status; // Post status is injected??>">
	</div>
	</div>
	<div class="clearfix"></div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
		<a class="btn btn-danger" onclick="return deleteConfirmation()" href="posts.php?delete=<?php echo $post_id ?>">Delete Post</a>
	</div>
</form>
