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



	<!-- Стили -->
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">

	<title>Admin Section - Edit Posts</title>
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
				<a href="create.php" class="btn btn-big">Add Post</a>
				<a href="index.php" class="btn btn-big">Manage Posts</a>
			</div>

			<div class="content">


				<h2 class="page-title">Edit Post</h2>

				<?php include(Root_PATH . '/app/helpers/formErrors.php'); ?>

				<form action="edit.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<div>
						<label>Title</label>
						<input type="text" name="title" value="<?php echo $title ?>" class="text-input">
					</div>

					<div>
						<label>Body</label>
						<textarea name="body" id="editor" ><?php echo $body ?></textarea>
						<script>
                			ClassicEditor.create(document.querySelector("#editor")).catch(
                  				(error) => {
                    			console.error(error);
                  				}
                			);
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
						<?php if (empty($published) && $published == 0): ?>
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
						<button type="submit" name="update-post" class="btn btn-big">Update Post</button>
					</div>

				</form>
			</div>
 		</div>

		<!-- // Admin Content -->


	</div>
	<!-- Admin Page Wrapper -->
</body>
</html>