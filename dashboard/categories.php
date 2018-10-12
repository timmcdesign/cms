<?php

include "includes/admin-header.php";
include "includes/admin-footer.php";

?>
<body>

	<div id="wrapper">

		<?php
		include	"includes/admin-navigation.php";
		?>

		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12 admin-header">
						<h1 class="page-header">Categories</h1><a class="btn btn-secondary admin-back" onclick="goBack()">< Go Back</a>

						<!-- Categories Form  -->
						<div class="col-xs-6">

							<form class="create-cat-form" action="" method="post">
								<div class="form-group">
									<label for="cat_title">Create Category Name:</label>
									<input class="form-control" type="text" name="cat_title" value="">
								</div>
								<div class="form-group">
									<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
								</div>
							</form>

							<?php	// Update Categories = Found in includes folder

								if(isset($_GET['edit'])){
									include "includes/category_update.php";
								}
							?>

						</div>

						<!-- Categories Form  -->
						<div class="col-xs-6">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th width='40' style='text-align:center;'>Id</th>
										<th>Category Name</th>
										<th style='text-align:center;'>Actions</th>
									</tr>
								</thead>
								<tbody>

								<!-- Find refactored php code in ../dashboard/functions.php! -->

								<?php

								insertCategories();

								pullCategories();

								deleteCategory();

								?>

								</tbody>
							</table>

						</div>

					</div>
				</div>

			</div>

		</div>

	</div>
