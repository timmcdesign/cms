<?php

include "includes/admin-header.php";

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
					<div class="col-lg-12">

						<h1 class="page-header">
							Dashboard
							<small>Welcome
								<?php
								//	This will display a loged in users first name to personalise the login screen
								echo $_SESSION['user_first_name']; ?>
							</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fas fa-tachometer-alt"></i>  <a href="../dashboard/index.php">Dashboard</a>
							</li>
							<li class="active">
								<i class="fas fa-file"></i> Blank Page
							</li>
						</ol>
					</div>
				</div>

			</div>

		</div>

	</div>

<?php
	include "includes/admin-footer.php";
 ?>
