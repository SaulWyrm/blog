<?php
include("../../path.php");
include(Root_PATH . "/app/controllers/posts.php");
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

	<title>Admin Section - Manage Posts</title>
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


				<h2 class="page-title">Manage Posts</h2>

				<?php include(Root_PATH . "/app/includes/messages.php"); ?>

				<table>
					<thead>
						<th>SN</th>
						<th>Title</th>
						<th>Author</th>
						<th colspan="3">Action</th>
					</thead>
					<tbody>
						<?php foreach ($posts as $key => $post): ?>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $post['title']; ?></td>
								<td><?php echo $post['username']; ?></td>
								<td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
								<td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
								<?php if ($post['published']): ?>
									<td><a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">unpublish</a></td>
								<?php else: ?>
									<td><a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="publish">publish</a></td>
								<? endif; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
 		</div>
		<!-- // Admin Content -->


	</div>
	<!-- Admin Page Wrapper -->
</body>
</html>