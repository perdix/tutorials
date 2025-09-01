<script>
	let { data } = $props();
	import { enhance } from "$app/forms";
</script>

<header>
	<h1>New event</h1>
</header>

<form method="POST" action="?/createEvent" use:enhance enctype="multipart/form-data" >
	<div>
		<label for="title">Title</label>
		<input type="text" placeholder="Title" name="title" />
	</div>

	<div>
		<label for="title">Image</label>
		<input type="file" placeholder="image" name="image" />
	</div>

	<div>
		<label for="description">Description</label>
		<textarea placeholder="Description" name="description"></textarea>
	</div>

	<div>
		<label for="url">URL</label>
		<input type="text" placeholder="URL" name="url" />
	</div>

	<div>
		<label for="startDate">Start Date</label>
		<input type="date" name="startDate" />
	</div>

	<div>
		<label for="endDate">End Date</label>
		<input type="date" name="endDate" />
	</div>

	<div>
		<label for="startTime">Start Time</label>
		<input type="time" name="startTime" />
	</div>

	<div>
		<label for="location">Location</label>
		<select name="locationId">
			{#each data.locations as location (location.id)}
				<option value={location.id}>{location.name}</option>
			{/each}
		</select>
	</div>

	<div>
		<label for="category">Category</label>
		<select name="categoryId">
			{#each data.categories as category (category.id)}
				<option value={category.id}>{category.name}</option>
			{/each}
		</select>
	</div>

	<button type="submit">Create Event</button>
</form>

<style>
	form {
		display: flex;
		flex-direction: column;
		margin-left: auto;
		margin-right: auto;
		gap: 15px;
	}
	form div {
		display: flex;
		flex-direction: column;
	}
</style>
