<script>
	import { enhance } from '$app/forms';
	import Warning from '$lib/components/Warning.svelte';
	import { slide } from 'svelte/transition';

	let { data, form } = $props();
</script>

<header>
	<h1>Locations</h1>
	<a href="/admin/locations/new">Create a new location</a>
</header>

{#if form && !form.success}
	<Warning message={form.message} />
{/if}

{#each data.locations as location (location.id)}
	<div class="box" transition:slide>
		<p>{location.id} - {location.name}</p>

		<form action="?/deleteLocation" method="POST" use:enhance>
			<input type="hidden" name="id" value={location.id} />
			<button type="submit">Delete</button>
		</form>
	</div>
{/each}

<style>
	.box {
		border: 1px solid #ccc;
		padding: 10px;
		margin: 5px 0;
	}
</style>
