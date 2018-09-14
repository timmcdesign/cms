<?php
	include 'includes/db.php';
	include 'includes/header.php';
?>

<body>

	<?php

		include 'includes/navigation.php'

	 ?>

	<!-- Page Content -->
	<div class="post container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<?php

				if(isset($_GET['p_id'])){
					$post_id = $_GET['p_id'];
				}

					//	This Query is selecting all post data, that matches to the post_id from p_id via GET

					$query = "SELECT * FROM posts WHERE post_id = $post_id";
					$select_all_posts_query = mysqli_query($connection,$query);

					while($row = mysqli_fetch_array($select_all_posts_query)){
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_date = $row['post_date'];
						$post_image = $row['post_image'];
						$post_content = $row['post_content'];
						$post_comment_count = $row['post_comment_count'];
					?>

					<!-- First Blog Post -->

					<!--	Images are not saved to a database, as this would take to much space.
							So in order to have images from posts stored in the database, save the image name to the post!
							This is so we can call the image name in the src link in the img tag.
							If the image name changes however it will break unless updated in the database.
							This needs to be remembered when building the admin panel with image name change functaionality.
							The name of the image is then echo'ed in the image path!	See Below!! 	-->

					<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">

					<h2><?php echo $post_title; ?></h2>

					<p class="">by <a href="index.php"><?php echo $post_author; ?></a> | Posted <?php echo $post_date; ?></p>

					<hr>

					<p class="post-body"><?php echo $post_content; ?></p>

					<a class="btn btn-secondary admin-back" onclick="goBack()">&lt; Go Back</a>

					<hr>

					<?php
						//	Here is where the while loop is turned off!!!!
						}
					 ?>

					 <!-- Blog Comment PHP -->

					<?php

					//	PHP query to insert comment into DB from the front end

					if(isset($_POST['create_comment'])){
					$the_post_id = $_GET['p_id'];

					$comment_email = $_POST['comment_email'];
					$comment_author = $_POST['comment_author'];
					$comment_content = $_POST['comment_content'];

					$query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
					$query .= "VALUES('{$the_post_id}', '$comment_author', '{$comment_email}', '$comment_content', 'unapproved', now())";

					$create_comment_query = mysqli_query($connection,$query);

					if(!$create_comment_query ){
						die('QUERY FAILED' . ' - ' . mysqli_error($connection));
					}

					//	This query will incrementaly increase the comment count each time a comment is created
					//	This will need to be replicated for deleting / rejecting a comment

					$query = "UPDATE post SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id";
					$update_comment_count = mysqli_query($connection,$query);

					}

					?>

					 <!-- Comments Form -->
					 <div class="well">
					 	<h4>Leave a Comment:</h4>
					 	<form action="" method="post" role="form">
							<div class="form-group">
								<label for="author">Name:</label>
								<input type="text" name="comment_author" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="email">Email Address:</label>
								<input type="email" name="comment_email" class="form-control" value="">
							</div>
					 		<div class="form-group">
								<label for="comment">Message:</label>
					 			<textarea name="comment_content" class="form-control" rows="3"></textarea>
					 		</div>
					 		<button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
					 	</form>
					 </div>

					 <!-- Posted Comments -->

					<h4>Comments:</h4>

					<hr>

					<?php

					$query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
					$query .=" AND comment_status = 'Approved'";
					$query .=" ORDER BY comment_id DESC";

					$select_comments_query = mysqli_query($connection, $query);

					if(!$select_comments_query) {
						die('QUERY FAILED' . mysqli_error($connection));
					}
					while ($row = mysqli_fetch_array($select_comments_query)){
						$comment_date = $row['comment_date'];
						$comment_content = $row['comment_content'];
						$comment_author = $row['comment_author'];

					?>

					<!-- Comment -->
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/64x64" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading"><?php echo $comment_author ?><small> - <?php echo $comment_date ?></small></h4>
							<?php echo $comment_content ?>
						</div>
					</div>

					<?php
					// Ending the while loop
					}
					?>

			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php

			include 'includes/blog-sidebar.php';

			 ?>

		</div>
		<!-- /.row -->

		<hr>
<?php

include 'includes/footer.php';

 ?>
