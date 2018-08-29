<?php
	include 'includes/db.php';
	include 'includes/header.php';
?>

<body>

	<?php

		include 'includes/navigation.php'

	 ?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="page-header">Welcome<small> - The Latest News</small>
				</h1>

				<?php

					//	Query is selecting all from the posts table.
					//	We have defined the variables we want from the database
					//	The post content is in the while loop and echo with the varaibles
					//	And the while loop is turned off after all of the html tags!!

					$query = "SELECT * FROM posts";
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

					<h2><a href="#"><?php echo $post_title; ?></a></h2>
					<p class="lead">by <a href="index.php"><?php echo $post_author; ?></a> | Posted <?php echo $post_date; ?></p>
					<hr>
					<p><?php echo $post_content; ?></p>
					<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

					<hr>

					<?php
						//	Here is where the while loop is turned off!!!!
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