<script>
	import { enhance } from '$app/forms';
	import Warning from '$lib/components/Warning.svelte';
	import { slide } from 'svelte/transition';

	let { data, form } = $props();
</script>

<header>
	<h1>Categories</h1>
	<a href="/admin/categories/new">Create a new category</a>
</header>

{#if form && !form.success}
	<Warning message={form.message} />
{/if}

{#each data.categories as category (category.id)}
	<div class="box" transition:slide>

		<div>
	<p>{category.name}</p>


		<a href="/admin/categories/{category.id}/edit">
			Edit
		</a>
	
		</div>
	

		<form action="?/deleteCategory" method="POST" use:enhance>
			<input type="hidden" name="id" value={category.id} />
			<button type="submit">Delete</button>
		</form>

	</div>
{/each}

<style>
	.box {
		border: 1px solid #ccc;
		padding: 10px;
		margin: 5px 0;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
</style>
