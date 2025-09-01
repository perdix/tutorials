<script>
	import { enhance } from '$app/forms';
	let { data } = $props();

</script>

<header>
	<h1>Edit Category</h1>
</header>

<form method="POST" action="?/updateCategory" use:enhance class="form">

	<input type="hidden" name="id" value={data.category.id} />

	<label for="title">Name</label>
	<input type="text" placeholder="Name" name="name" value={data.category.name} />

	<label for="description">Name</label>
	<textarea placeholder="Description" name="description">{data.category.description}</textarea>

	<button type="submit">Update category</button>
</form>


<style>
	.form {
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: flex-start;
		gap: 10px;
	}
</style>