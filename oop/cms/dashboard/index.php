<?php include("includes/header.php"); ?>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

		<!-- Brand and toggle get grouped for better mobile display -->
		<?php include("includes/navigation-top.php"); ?>

		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<<?php include("includes/navigation-sidebar.php") ?>

	</nav>

	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">

					<h1 class="page-header">
						Dashboard<small> Subheading</small>
					</h1>

					<ol class="breadcrumb">
						<li class="active">
							<i class="fa fa-dashboard"></i>  Dashboard
						</li>
					</ol>

				</div>
			</div>

			<?php include("includes/admin_content.php") ?>

			<!-- Content area -->
		</div>

	</div>

<?php include("includes/footer.php"); ?>
