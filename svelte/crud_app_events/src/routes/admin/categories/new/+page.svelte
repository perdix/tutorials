<script>
	import { enhance } from '$app/forms';
</script>

<header>
	<h1>New Category</h1>
</header>

<form method="POST" action="?/createCategory" use:enhance>
	<label for="title">Name</label>
	<input type="text" placeholder="Name" name="name" />

	<label for="description">Name</label>
	<textarea placeholder="Description" name="description"></textarea>

	<button type="submit">Create category</button>
</form>
