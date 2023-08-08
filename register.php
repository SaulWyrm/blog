
<?php include("path.php"); ?>
<?php include(Root_PATH . "/app/controllers/users.php"); ?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/ece4dee9b5.js" crossorigin="anonymous"></script>

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">



	<!-- Стили -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<title>Register Page</title>
</head>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Script -->
<script src="assets/js/script.js"></script>

<body>
	<!-- Include Header -->
	<?php include(Root_PATH . "/app/includes/header.php"); ?>

	<!-- Обертка страницы -->
	<div class="auth-content">
		<form action="register.php" method="post">
			<h2 class="form-title">Register</h2>

			<!-- Include formError check -->
			<?php include(Root_PATH . "/app/helpers/formErrors.php"); ?>

			<div>
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
			</div>
			<div>
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
			</div>
			<div>
				<label>Password</label>
				<input type="paddword" name="password" value="<?php echo $password; ?>" class="text-input">
			</div>
			<div>
				<label>Password Confirmation</label>
				<input type="paddword" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
			</div>
			<div>
				<button type="submit" name="register-btn" class="btn btn-big">Register</button>
				<p>Or <a href="<?php echo Base_URL . '/login.php' ?>">Sign In</a></p>
			</div>
		</form>

	</div>


	<!-- // Footer -->

</body>
</html>