<div class="col-md-4 sidebar">

	<!-- Blog Search Well

	To create a searchengine for your website, you need to use a form that uses $_POST.
	First set up a form with an input and submit button.
	Then we use an if statment to check the database using a query for the search term.
	For this example, the search works by pulling key words from the posts table via the post_tags column.
	To make the search dynamic, we will output the results on a new page, so we can filter the posts.
	This is done using the DB to call posts that match the search term, on a new page.

	-->

	<div class="well">
		<h4>Blog Search</h4>
		<form action="search-results.php" method="post">
		<div class="input-group">
			<input type="text" name="search" class="form-control">
			<span class="input-group-btn">
				<button name="submit" class="btn btn-default" type="submit">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		</div>
		</form>
	</div>

	<!-- Blog Categories Well



	-->

	<div class="well">
		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-6">
				<ul class="list-unstyled">

				<?php
					$query = "SELECT * FROM categories Limit 2";	//	Here you can set limits for what is displayed
					$select_all_categories_query = mysqli_query($connection,$query);

					while($row = mysqli_fetch_array($select_all_categories_query)){
						$cat_title = $row['cat_title'];

						echo "<li><a href='#'>{$cat_title}</a></li>";
					}
	 			?>
				</ul>
			</div>
		</div>
	</div>

	<!-- Side Widget Well -->
	<?php

	include "sidebar-widget.php"; ?>

</div>
