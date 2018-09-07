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

					 <!-- Blog Comments -->

					 <!-- Comments Form -->
					 <div class="well">
					 	<h4>Leave a Comment:</h4>
					 	<form role="form">
					 		<div class="form-group">
					 			<textarea class="form-control" rows="3"></textarea>
					 		</div>
					 		<button type="submit" class="btn btn-primary">Submit</button>
					 	</form>
					 </div>

					 <hr>

					 <!-- Posted Comments -->

					 <!-- Comment -->
					 <div class="media">
					 	<a class="pull-left" href="#">
					 		<img class="media-object" src="http://placehold.it/64x64" alt="">
					 	</a>
					 	<div class="media-body">
					 		<h4 class="media-heading">Start Bootstrap
					 			<small>August 25, 2014 at 9:30 PM</small>
					 		</h4>
					 		Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
					 	</div>
					 </div>

					 <!-- Comment -->
					 <div class="media">
					 	<a class="pull-left" href="#">
					 		<img class="media-object" src="http://placehold.it/64x64" alt="">
					 	</a>
					 	<div class="media-body">
					 		<h4 class="media-heading">Start Bootstrap
					 			<small>August 25, 2014 at 9:30 PM</small>
					 		</h4>
					 		Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
					 		<!-- Nested Comment -->
					 		<div class="media">
					 			<a class="pull-left" href="#">
					 				<img class="media-object" src="http://placehold.it/64x64" alt="">
					 			</a>
					 			<div class="media-body">
					 				<h4 class="media-heading">Nested Start Bootstrap
					 					<small>August 25, 2014 at 9:30 PM</small>
					 				</h4>
					 				Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
					 			</div>
					 		</div>
					 		<!-- End Nested Comment -->
					 	</div>
					 </div>


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
