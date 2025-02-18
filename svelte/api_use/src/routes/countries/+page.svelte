<script>
	// Load the data from the page properties
	let { data } = $props();
</script>

<h1>{data.title}</h1>

<div class="list">
	<!-- Loop through the countries -->
	{#each data.countries as country}
		<!-- Link to the country detail page -->
		<a href="/countries/{country.name.common}">{country.name.common}</a>
	{/each}
</div>

<style>
	.list {
		display: flex;
		flex-wrap: wrap;
		gap: 5px;
	}
</style>
