
<?php include("path.php"); ?>
<?php include(Root_PATH . '/app/controllers/posts.php');

if (isset($_GET['id'])){
	$post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

?>

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

	<title><?php echo $post['title']; ?> | HardThingsEasyWay</title>
</head>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Script -->
<script src="assets/js/script.js"></script>

<body>

	<!-- Include Header -->
	<?php include(Root_PATH . "/app/includes/header.php"); ?>

	<!-- Обертка страницы -->
	<div class="page-wrapper">
		<!-- Контент -->

			<div class="content clearfix">

				<!-- Main Content Wrapper-->

				<div class="main-content-wrapper">
					<div class="main-content single">
						<h1 class="post-title"><?php echo $post['title']; ?></h1>
						<div class="post-content">
							<?php echo html_entity_decode($post['body']); ?>
						</div>
					</div>
				</div>


				<!-- // Main Content -->

				<!-- Side Bar -->
				<div class="sidebar single">

					<div class="section popular">
						<h2 class="section-title">Popular</h2>

						<?php foreach ($posts as $p): ?>
							<div class="post clearfix">
								<img src="<?php echo Base_URL . '/assets/img/' . $p['image']; ?>">
								<a href="#" class="title"><h4><?php echo $p['title'] ?></h4></a>
							</div>
						<?php endforeach; ?>


					</div>

					<div class="section topics">
						<h2 class="section-title">Topics</h2>
						<ul>
							<?php foreach ($topics as $topic): ?>
								<li><a href="<?php echo Base_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>


				</div>

				<!-- // Side Bar -->

			</div>

			<!-- // Контент -->


	</div>
	<!-- Обертка страницы -->

	<!-- Include footer -->
	<?php include(Root_PATH . "/app/includes/footer.php"); ?>

</body>
</html>