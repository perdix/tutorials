export async function load({ params, fetch }) {
	let response = await fetch('https://restcountries.com/v3.1/name/' + params.commonName);
	let country = await response.json();

	return {
		country: country
	};
}
