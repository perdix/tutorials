// We use the fetch function to load data from an API
// Sveltekit provides a improved fetch function that works similar to the standard fetch function
export async function load({ fetch }) {
	// Fetch all countries from the API
	let response = await fetch('https://restcountries.com/v3.1/all?fields=name');
	let countries = await response.json();

	// Fill the page data object with the countries
	return {
		title: 'All countries',
		countries: countries
	};
}
