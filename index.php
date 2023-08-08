
<?php
include("path.php");
include(Root_PATH . "/app/controllers/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])){
	$posts = getPostsByTopicId($_GET['t_id']);
	$postsTitle = "You searched for posts under \"" . $_GET['name'] . "\"";
} else if (isset($_POST['search-term']))  {
	$postsTitle = "You searched for \"" . $_POST['search-term'] . "\"";
	$posts = searchPosts($_POST['search-term']);
} else {
	$posts = getPublishedPosts();
}


?>



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

	<title>Nikonchuk Blog</title>
</head>






<body>

	<!-- Include Header -->
	<?php include(Root_PATH . "/app/includes/header.php"); ?>

	<!-- Include message popups -->
	<?php include(Root_PATH . "/app/includes/messages.php"); ?>



	<!-- Обертка страницы -->
	<div class="page-wrapper">
		<!-- Cлайдер постов -->
		<div class="post-slider">
			<h1 class="slider-title">Trending Posts</h1>
			<i class="fa-solid fa-chevron-left prev"></i>
			<i class="fa-solid fa-chevron-right next"></i>
			<div class="post-wrapper">

				<?php foreach ($posts as $post): ?>

					<div class="post">
						<a href="single.php?id=<?php echo $post['id']; ?>">
							<img src="<?php echo Base_URL . '/assets/img/' . $post['image']; ?>" class="slider-image">
						</a>
						<div class="post-info">
							<h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo (substr($post['title'], 0, 15) . '...'); ?></a></h4>
							<i class="far fa-user"><?php echo $post['username']; ?></i>
							&nbsp;
							<i class="far fa-calendar"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
						</div>
					</div>
				<?php endforeach; ?>

			</div>


		</div>

		<!-- Контент -->

		<div class="content clearfix">

			<!-- Main Content -->
			<div class="main-content">
				<div class="post-list">
					<h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

					<?php foreach ($posts as $post): ?>

						<div class="post clearfix">
							<img src="<?php echo Base_URL . '/assets/img/' . $post['image']; ?>" class="post-image">
							<div class="post-preview">
								<h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
								<i class="far fa-user"><?php echo $post['username']; ?></i>
								&nbsp;
								<i class="far fa-calendar"><?php echo $post['created_at']; ?></i>
								<p class="preview-text">
									<?php echo html_entity_decode(substr($post['body'], 0, 150). '...');?>
								</p>
								<a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>


			<!-- // Main Content -->

			<div class="sidebar">

				<div class="section search">
					<h2 class="section-title">Search</h2>
					<form action="index.php" method="post">
						<input type="text" name="search-term" class="text-input" placeholder="Search...">
					</form>
				</div>

				<div class="section topics">
					<h2 class="section-title">Topics</h2>
					<ul>
						<?php foreach ($topics as $key => $topic): ?>
							<li><a href="<?php echo Base_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
						<?php endforeach; ?>

					</ul>
				</div>


			</div>

		</div>

		<!-- // Контент -->


	</div>
	<!-- Обертка страницы -->

	<!-- Include footer -->
	<?php include(Root_PATH . "/app/includes/footer.php"); ?>

</body>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
<!-- Slick Carousel -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Script -->
<script src="assets/js/script.js"></script>

<script type="text/javascript">
	const loadMoreBtn = document.querySelector('.load-more-btn');
	const postList = document.querySelector('.post-list');
	const paginationLinks = document.querySelector('.pagination-links');

	function displayPosts(posts){
		posts.forEach(post => {
			let postHtmlString = `
			<div class="post clearfix">
			<img src="${post.image}" class="post-image">
			<div class="post-preview">
			<h2><a href="single.php?id=${post.id}">${post.title}</a></h2>
			<i class="far fa-user">${post.username}</i>
			&nbsp;
			<i class="far fa-calendar">${post.created_at}</i>
			<p class="preview-text">
			${post.body}
			</p>
			<a href="single.php?id=${post.id}" class="btn read-more">Read More</a>
			</div>
			</div>
			`;

			const domParser = new DOMParser();
			const doc = domParser.parseFromString(postHtmlString, 'text/html');
			const postNode = doc.body.firstChild;
			postList.appendChild(postNode);
		});
	}

	let nextPage = 2;

	loadMoreBtn.addEventListener('click', async function(e) {
		loadMoreBtn.textContent = 'Loading...';
		const response = await fetch(`index.php?page=${nextPage}&ajax=1`);
		const data = await response.json();
		console.log({data});

		displayPosts(data.posts);
		nextPage = data.nextPage;
		if (!data.nextPage) {
			paginationLinks.innerHTML = '<div style="color: gray;">No more Posts</div>';
		} else {
			loadMoreBtn.textContent = 'Load more';
		}
	});

</script>
</html>