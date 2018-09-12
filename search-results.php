<?php
	include 'includes/db.php';
	include 'includes/header.php';
?>

<script language="JavaScript" type="text/javascript" src="includes/scripts.js"></script>

<body>

	<!--	//	Query is selecting all from the posts table.
			//	We have defined the variables we want from the database
			//	The post content is in the while loop and echo with the varaibles
			//	And the while loop is turned off after all of the html tags!!
	-->

	<?php

		include 'includes/navigation.php'

	 ?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="page-header">Search Results
				</h1>

				<?php
					//	To create a searchengine for your website, you need to use a form using $_POST
					//	First set up a form with an input and submit button.
					//	Then use an if statment to check the database using a query

					if(isset($_POST['submit'])){
						$search = $_POST['search'];

						$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
						$search_query = mysqli_query($connection, $query);
					}

					//	This will tell users if no search result is found
					//	This works by using num_rows to identify the number of rows found from a search result
					//	If equal or == to 0, this means it couldnt find anything

					$count = mysqli_num_rows($search_query);

					if($count == 0){
						echo "<h1><small>No Results...</small></h1>";
					}

					//	This Else statment spits out the HTML for each post search result using a while loop.
					//	Post info from DB are assigned variables and echoed into the html content area

					else {

						while($row = mysqli_fetch_array($search_query)){
							$post_title = $row['post_title'];
							$post_author = $row['post_author'];
							$post_date = $row['post_date'];
							$post_image = $row['post_image'];
							$post_content = substr($row['post_content'],0,180);	// This code limits the nuber of characters by 180
						?>

						<!-- Blog Post -->

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
					}
				 ?>
			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php

			include 'includes/blog-sidebar.php';

			 ?>

		</div>

		<!-- This Button uses javascript to goback in history, rather then using a hyperlink using onclick -->

		<a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

		<hr>
	<?php

	include 'includes/footer.php';

	?>
