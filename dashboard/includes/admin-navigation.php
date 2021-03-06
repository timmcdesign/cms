		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<p class="navbar-brand" style="color:#fff;"> Admin Panel</p>
			</div>

			<!-- Top Menu Items -->
			<ul class="nav navbar-right top-nav">
				<li class="dropdown"><a class="dropdown-toggle burger-menu" data-toggle="dropdown" href="#">Logged in as <?php echo $_SESSION['user_first_name']; ?></a>
					<ul class="dropdown-menu">
						<li>
							<a href="profile.php"><i class="fas fa-user"></i>Profile</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a>
						</li>
					</ul>
				</li>
			</ul>




			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">
					<li>
						<a href="../dashboard/index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
					</li>
					<li>
						<a href="javascript:;" data-toggle="collapse" data-target="#post_dropdown"><i class="fas fa-file"></i>Posts <i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="post_dropdown" class="collapse">
							<li>
								<a href="posts.php?source=none">View Posts</a>
							</li>
							<li>
								<a href="posts.php?source=add_post">New Post</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="../dashboard/categories.php"><i class="fas fa-layer-group"></i>Catagories</a>
					</li>
					<li class="">
						<a href="../dashboard/comments.php"><i class="fas fa-comment"></i>Comments</a>
					</li>
					<li>
						<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fas fa-users"></i>Users <i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="demo" class="collapse">
							<li>
								<a href="../dashboard/users.php">View Users</a>
							</li>
							<li>
								<a href="../dashboard/users.php?source=add">New User</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="../dashboard/profile.php"><i class="fas fa-user"></i>Profile</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
