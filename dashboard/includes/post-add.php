<?php
	if(isset($_POST['create_post'])){
		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['status'];

		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['tags'];
		$post_content = $_POST['content'];
		$post_date = date('y-m-d');
		$post_comment_count = 1;

		move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "INSERT INTO posts (post_title, post_author, post_category_id, post_status, post_image, post_tags, post_content, post_date, post_comment_count)";
		$query .= "VALUES ('{$post_title}', '{$post_author}', '{$post_category_id}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', '{$post_date}', '{$post_comment_count}') ";

		$create_post_query = mysqli_query($connection, $query);
confirmConnection($create_post_query);
	}

?>

<div class="col-lg-9 admin-header">
<h1 class="page-header">Create Post</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

<form class="create-post-form" action="" method="post" enctype="multipart/form-data">
<!--  The enctype attribute specifies how  form-dat	a should be encoded when submitted to your server  -->

	<?php

	//	Message shown if page does updates

	if(isset($_POST['create_post'])){?>
		<div class="alert alert-success" role="alert">Post Successfully Created</div>
	<?php
	}?>

	<div class="form-group">
		<label for="post_title">Post Title:</label>
		<input class="form-control" type="text" name="title" value="">
	</div>
	<div class="form-group">
		<label for="post_content">Content:</label>
		<textarea class="form-control" type="content" name="content" rows="11" value=""></textarea>
	</div>
	<div class="form-group">
		<label for="post-image">Featued Image:</label>
		<input class="" type="file" name="image" value="">
	</div>
	<div class="col-lg-3" style="padding-left:0px;">
	<div class="form-group">
		<label for="post_author">Author:</label>
		<input class="form-control" type="text" name="author" value="">
	</div>
	</div>
	<div class="col-lg-3" style="padding-left:0px;">
	<div class="form-group">
		<label for="category">Category:</label><br>
		<select class="" name="post_category" id="post_category" style="width:100%; height: 34px;">
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
		<input class="form-control" type="text" name="tags" value="">
	</div>
	</div>
	<div class="col-lg-3" style="padding-left:0px;">
	<div class="form-group">
		<label for="post_status">Status:</label>
		<input class="form-control" type="text" name="status" value="">
	</div>
	</div>
	<div class="clearfix"></div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>
</form>
