<script>
	let { children } = $props();
</script>

<nav>
	<a href="/" class="home">🏠</a>
	<a href="/admin/events">Events</a>
	<a href="/admin/locations">Locations</a>
	<a href="/admin/categories">Categories</a>
</nav>

<main>
	{@render children()}
</main>

<style>
	nav {
		background: #3652a5;
		color: white;
		display: flex;
		align-items: stretch;
	}
	.home {
		font-size: 1.5em;
		background-color: #bfc7e1;
		margin-right: auto;
	}

	nav a {
		color: white;
		text-decoration: none;
		padding: 15px 20px;
		display: flex;
		align-items: center;
	}
	nav a:hover {
		background: #2a3f7f;
	}

	main {
		padding: 30px;
		max-width: 1200px;
		margin: 0 auto;
	}
</style>
