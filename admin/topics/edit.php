<?php include("../../path.php");
	  include(Root_PATH . "/app/controllers/topics.php");
?>
<?php adminOnly(); ?>

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
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">

	<title>Admin Section - Edit Topic</title>
</head>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<!-- Script -->
<script src="../../assets/js/script.js"></script>



<body>

	<!-- Include Admin Header -->
	<?php include(Root_PATH . "/app/includes/adminHeader.php"); ?>

	<!-- Admin Page Wrapper -->
	<div class="admin-wrapper">

		<!-- Include Admin Sidebar -->
		<?php include(Root_PATH . "/app/includes/adminSidebar.php"); ?>


		<!-- Admin Content -->
		<div class="admin-content">
			<div class="button-group">
				<a href="create.php" class="btn btn-big">Add Topic</a>
				<a href="index.php" class="btn btn-big">Manage Topics</a>
			</div>

			<div class="content">


				<h2 class="page-title">Edit Topic</h2>

				<?php include(Root_PATH . '/app/helpers/formErrors.php'); ?>

				<form action="edit.php" method="post">

					<input type="hidden" name="id" value="<?php echo $id; ?>">

					<div>
						<label>Name</label>
						<input type="text" name="name" value="<?php echo $name; ?>" class="text-input">
					</div>

					<div>
						<label>Description</label>
						<textarea name="description" id="editor"><?php echo $description; ?></textarea>
						<script>
                			ClassicEditor.create(document.querySelector("#editor")).catch(
                  				(error) => {
                    			console.error(error);
                  				}
                			);
    					</script>
					</div>

					<div>
						<button type="submit" name="update-topic" class="btn btn-big">Update Topic</button>
					</div>

				</form>
			</div>
 		</div>

		<!-- // Admin Content -->


	</div>
	<!-- Admin Page Wrapper -->
</body>
</html>