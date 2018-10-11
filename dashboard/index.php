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
									echo $_SESSION['user_first_name'];
								?>
							</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fas fa-tachometer-alt"></i> <a href="../dashboard/index.php">Dashboard</a>
							</li>
							<li class="active">
								<i class="fas fa-file"></i> Blank Page
							</li>
						</ol>
		 				<div class="row">
					<div class="col-lg-3 col-md-6">
							<div class="panel panel-primary">
									<div class="panel-heading">
											<div class="row">
													<div class="col-xs-3">
															<i class="fa fa-file-text fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">

														<?php

															//	Pulling post count to dashboard

															$query = "SELECT * FROM posts";
															$select_all_posts = mysqli_query($connection, $query);

															$post_count = mysqli_num_rows($select_all_posts);

														 ?>

												<div class='huge'><?php echo $post_count; ?></div>
															<div>Posts</div>
													</div>
											</div>
									</div>
									<a href="posts.php">
											<div class="panel-footer">
													<span class="pull-left">View Details</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
											</div>
									</a>
							</div>
					</div>
					<div class="col-lg-3 col-md-6">
							<div class="panel panel-green">
									<div class="panel-heading">
											<div class="row">
													<div class="col-xs-3">
															<i class="fa fa-comments fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">

														<?php

															//	Pulling post count to dashboard

															$query = "SELECT * FROM comments";
															$select_all_comments = mysqli_query($connection, $query);

															$comment_count = mysqli_num_rows($select_all_comments);

														 ?>

														<div class='huge'><?php echo $comment_count; ?></div>
														<div>Comments</div>
													</div>
											</div>
									</div>
									<a href="comments.php">
											<div class="panel-footer">
													<span class="pull-left">View Details</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
											</div>
									</a>
							</div>
					</div>
					<div class="col-lg-3 col-md-6">
							<div class="panel panel-yellow">
									<div class="panel-heading">
											<div class="row">
													<div class="col-xs-3">
															<i class="fa fa-user fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">

														<?php

															//	Pulling user count to dashboard

															$query = "SELECT * FROM users";
															$select_all_users = mysqli_query($connection, $query);

															$user_count = mysqli_num_rows($select_all_users);

														 ?>

													<div class='huge'><?php echo $user_count; ?></div>
															<div> Users</div>
													</div>
											</div>
									</div>
									<a href="users.php">
											<div class="panel-footer">
													<span class="pull-left">View Details</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
											</div>
									</a>
							</div>
					</div>
					<div class="col-lg-3 col-md-6">
							<div class="panel panel-red">
									<div class="panel-heading">
											<div class="row">
													<div class="col-xs-3">
															<i class="fa fa-list fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">

														<?php

															//	Pulling category count to dashboard

															$query = "SELECT * FROM categories";
															$select_all_categories = mysqli_query($connection, $query);

															$category_count = mysqli_num_rows($select_all_categories);

														 ?>

															<div class='huge'><?php echo $category_count; ?></div>
																<div>Categories</div>
													</div>
											</div>
									</div>
									<a href="categories.php">
											<div class="panel-footer">
													<span class="pull-left">View Details</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
											</div>
									</a>
							</div>
					</div>
			</div>
			</div>
				</div>

				<!-- Pre Google Chart Query on data -->

				<?php

				?>

				<!-- Google Charts Bar Graph Script and HTML -->

				<div class="row">
					<div class="col-lg-12">
						<style>
							legend: {position: 'none'};
						</style>
						<script type="text/javascript">
						google.charts.load('current', {'packages':['bar']});
						google.charts.setOnLoadCallback(drawChart);

						function drawChart() {
							var data = google.visualization.arrayToDataTable([

								//	We are creating a loop using the dynamic data in the DB and displaying it in the graph
								//	We need two Arrays - an array of the Bar graph names, and the values

								['Data', 'How Many'],
								<?php

									$graph_text = ['Posts', 'Categories', 'Users', 'Comments'];
									$graph_count = [$post_count, $category_count, $user_count, $comment_count];

									//	This loop is creating the javascript required display the grapheme_extract
									/*	Example		['Year', 'Sales', 'Expenses', 'Profit'],
													['2014', 1000, 400, 200],
													['2015', 1170, 460, 250],
													['2016', 660, 1120, 300],
													['2017', 1030, 540, 350] 	*/

									//	The data in the two arrays is assigned to $i
									//	The logic in the  loop reads the entire array. starting from 0,
									//	and to incrementaly display each array value until the array ends.
									//	the google chart then reads the loop the exact same as the above

									for($i =0; $i < 4; $i++) {
										echo "['{$graph_text[$i]}'" . "," . "{$graph_count[$i]}],";
									}
								?>
							]);

							var options = {
								chart: {
								title: '',
								subtitle: ''
								}
							};

							var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

							chart.draw(data, google.charts.Bar.convertOptions(options));
						}
						</script>
					</div>
					<div id="columnchart_material" style="width:auto; height: 500px;"></div>

				</div>

			</div>

		</div>

	</div>

<?php
	include "includes/admin-footer.php";
 ?>
