<script>
	import { enhance } from '$app/forms';
	import { slide } from 'svelte/transition';

	let { data } = $props();
</script>

<header>
	<h1>Admin Events</h1>
	<a href="/admin/events/new">Create a new event</a>
</header>

{#each data.events as event (event.id)}
	<div class="box" transition:slide>
	
		<div style="display:flex; gap:10px;">
			{#if event.image}
			<img src="{event.image}" alt="" style="width: 50px; height: 50px; object-fit:cover;">
			{/if}
			<div>
				<p class="date">{new Date(event.start_date).toDateString()}</p>
				<p class="title">{event.title}</p>
				<p>{event.description}</p>
			</div>
		</div>

		<div>
			<p>{event.locationName}</p>
		</div>

		<form action="?/deleteEvent" method="POST" use:enhance>
			<input type="hidden" name="id" value={event.id} />
			<button type="submit">Delete</button>
		</form>
	</div>
{/each}

<style>
	.box {
		border: 1px solid #dfe0e5;
		background-color: white;
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 10px;
		margin: 5px 0;
	}
	p {
		margin: 0;
	}
	.title {
		font-size: 1.1rem;
		font-weight: 500;
	}
	.date {
		font-size: 0.8rem;
		color: #666;
	}
</style>
