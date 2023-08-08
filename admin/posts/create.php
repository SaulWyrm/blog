<?php include("../../path.php");?>
<?php include(Root_PATH . "/app/controllers/posts.php"); ?>
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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!-- Стили -->
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/textEditor.css">

	<title>Admin Section - Add Posts</title>

	<script src="../../ckeditor/ckeditor.js"></script>


</head>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



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
				<a href="create.php" class="btn btn-big">Add Post</a>
				<a href="index.php" class="btn btn-big">Manage Posts</a>
			</div>

			<div class="content">


				<h2 class="page-title">Add Post</h2>

				<?php include(Root_PATH . '/app/helpers/formErrors.php'); ?>

				<form action="create.php" method="post" enctype="multipart/form-data">
					<div>
						<label>Title</label>
						<input type="text" name="title" value="<?php echo $title ?>" class="text-input">
					</div>

					<div>
						<label>Body</label>
						<textarea name="body" id="editor" ><?php echo $body ?></textarea>
						<script type="text/javascript">
     						CKEDITOR.replace( 'editor' );
  						</script>
					</div>




					<div>
						<label>Image</label>
						<input type="file" name="image" class="text-input">
					</div>

					<div>
						<label>Topic</label>
						<select name="topic_id" class="text-input">

							<option value=""></option>

							<?php foreach ($topics as $key => $topic): ?>
								<?php if (!empty($topic_id) && $topic_id == $topic['id']): ?>
									<option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
								<?php else: ?>
									<option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>

					<div>
						<?php if (empty($published)): ?>
							<label>
								<input type="checkbox" name="published">
								Publish
							</label>
						<?php else: ?>
							<label>
								<input checked type="checkbox" name="published">
								Publish
							</label>
						<?php endif; ?>

					</div>

					<div>
						<button type="submit" name="add-post" class="btn btn-big">Add Post</button>
					</div>

				</form>
			</div>
		</div>

		<!-- // Admin Content -->


	</div>
	<!-- Admin Page Wrapper -->

	<script src="../../assets/js/richTextEdit.js"></script>
</body>

</html>