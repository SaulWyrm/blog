<header>
	<a class="logo" href="<?php echo Base_URL . '/index.php'; ?>">
		<h1 class="logo-text">Hard_Things_<br id="logo-break"><span>Easy_Way</span></h1>
	</a>
	<i class="fa fa-bars menu-toggle"></i>
	<ul class="nav">
		<?php if (isset($_SESSION['username'])): ?>
			<li><a href="../../index.php">Home</a></li>
			<li>
				<a href="#">
					<i class="fa fa-user"></i>
					<?php echo $_SESSION['username']; ?>
					<i class="fa fa-chevron-down" style="font-size: 0.8em"></i>
				</a>
				<ul>
					<li><a class="logout" href="<?php echo Base_URL . '/logout.php'; ?>">Logout</a></li>
				</ul>
			</li>
		<?php endif; ?>

	</ul>
</header>
