<script>
	import { flip } from 'svelte/animate';

	let { data } = $props();

	let filteredEvents = $state(data.events);
	let selectedCategory = $state('all');

	function filterEvents() {
		if (selectedCategory === 'all') {
			filteredEvents = data.events;
		} else {
			filteredEvents = data.events.filter((e) => e.category_id === selectedCategory.id);
		}
	}
</script>

<div class="header">
	{#if data.user}
		<div>
			<h2>Welcome, {data.user.username}!</h2>
			<a href="/admin">Admin Console</a>
		</div>

		<div class="actions">
			
			<form action="/logout?/deleteAccount" method="POST">
				<button type="submit">Delete Account</button>
			</form>
			<form action="/logout?/logout" method="POST">
				<button type="submit">Logout</button>
			</form>
		</div>
		
	{:else}
		<p>
			You are not logged in. 
		</p>
		<p>
			<a href="/login">Login</a>
			or 
			<a href="/register">Register</a>

		</p>
	{/if}
</div>

<div class="hero">
	<h1>Shkodra Events</h1>
	<p>What's going on in the city</p>
</div>

<main class="">
	<select name="" id="" bind:value={selectedCategory} onchange={filterEvents}>
		<option value="all">All</option>
		{#each data.categories as category}
			<option value={category}>{category.name}</option>
		{/each}
	</select>

	<div class="events">
		{#each filteredEvents as event (event.id)}
			<article animate:flip>

				{#if event.image}
				<img src="{event.image}" alt="" style="width: 100%; height: 150px; object-fit:cover;">
				{/if}
				<div class="event">
					<p class="location">{event.locationName}</p>
					<p class="category">{event.categoryName}</p>
					<h2>{event.title}</h2>
					<p class="date">
						{new Date(event.start_date).toDateString()}
					</p>
					<p class="desc">{event.description}</p>
				</div>
			</article>
		{/each}
	</div>
</main>

<style>
	.actions {
		display: flex;
		gap: 10px;
	}
	.header {
		display: flex;
		justify-content: space-between;
		padding: 12px;
		align-items: center;
	}

	.hero {
		background: linear-gradient(34deg, rgba(52, 66, 93, 1) 0%, rgba(36, 61, 97, 1) 100%);
		text-align: center;
		padding: 60px;
	}
	.hero h1 {
		font-size: 3em;
		color: white;
	}
	.hero p {
		color: rgb(225, 157, 69);
		font-size: 1.5em;
	}

	main {
		padding: 30px;
		background-color: #c8d3e2;
	}

	main .events {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
		max-width: 1200px;
		margin: 0 auto;
		gap: 15px;
	}
	article {
		height: 350px;
		background-color: white;
		border: 1px solid #dfe0e5;

	}
	.event {
		padding: 20px;
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: flex-start;
		gap: 5px;
	}
	.event p {
		font-size: 0.9rem;
		margin: 0px;
	}

	.event h2 {
		font-size: 1.2rem;
		margin: 0;
	}

	.event .location {
		color: rgb(225, 157, 69);
		font-size: 1rem;
	}
	.event .category {
		padding: 2px 10px;
		background-color: #f0f0f0;
		border-radius: 5px;
	}
</style>
