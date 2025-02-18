<script>
	let { data } = $props();
</script>

<h1>
	{data.country[0].name.common}
	{#if data.country[0].flag}
		{data.country[0].flag}
	{/if}
</h1>

{#if data.country[0].name.official !== data.country[0].name.common}
	<h2>
		{data.country[0].name.official}
	</h2>
{/if}

<p>
	<strong>Capital:</strong>
	{data.country[0].capital}
</p>

<p>
	<strong>Region:</strong>
	{data.country[0].region}
</p>

<p>
	<strong>Population:</strong>
	{data.country[0].population}
</p>

<a href="/countries">Back to the countries</a>
