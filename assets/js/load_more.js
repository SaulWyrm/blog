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

	displayPosts(data.posts);
	nextPage = data.nextPage;
	if (!data.nextPage) {
		paginationLinks.innerHTML = '<div style="color: gray;">No more Posts</div>';
	} else {
		loadMoreBtn.textContent = 'Load more';
	}
});
