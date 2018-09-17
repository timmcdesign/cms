<?php

include "includes/admin-header.php";
include "includes/admin-footer.php";

?>

<script language="JavaScript" type="text/javascript" src="includes/admin-scripts.js"></script>

<body>

	<div id="wrapper">

		<?php
		include	"includes/admin-navigation.php";
		?>

		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
						<?php
						$source = " "; // Defining the $source variable to remove erros
						if(isset($_GET['source'])){
							$source = $_GET['source'];
						}

						else {
						}
							switch($source) {
								case 'add':
									include "../dashboard/includes/users-add.php";
									break;

								case 'edit':
									include "../dashboard/includes/users-edit.php";
									break;

								default :
									include '../dashboard/includes/users-view-all.php';
									break;
								}
						 ?>

						<!-- Categories Form  -->
						<div class="col-xs-6">

						</div>

						<!-- Categories Form  -->
						<div class="col-xs-6">

						</div>

					</div>
				</div>

			</div>

		</div>

	</div>
