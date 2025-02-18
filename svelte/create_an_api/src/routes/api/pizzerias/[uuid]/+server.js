import pizzerias from './pizzerias.json';
import { promises as fs } from 'fs';

// The GET function is called when a GET request is made to the endpoint
export async function GET({ params }) {
	const { uuid } = params;
	// Find the pizzeria with the given id
	const pizzeria = pizzerias.find((p) => p.uuid === uuid);
	// Return a 200 OK response with the pizzeria as JSON
	return new Response(JSON.stringify(pizzeria), {
		status: 200,
		headers: { 'content-type': 'application/json' }
	});
}

// The PUT function is called when a PUT request is made to the endpoint
// It expects a JSON body with the updated data of the pizzeria
export async function PUT({ params, request }) {
	const { uuid } = params;
	// Get the JSON data from the request
	const data = await request.json();
	// Find the pizzeria with the given id
	const pizzeria = pizzerias.find((p) => p.uuid === uuid);
	// Update the pizzeria with the new data
	Object.assign(pizzeria, data);
	// Write the updated list to the pizzerias.json file
	await fs.writeFile('./pizzerias.json', JSON.stringify(pizzerias, null, 2));
	// Return a 200 OK response with the updated pizzeria as JSON
	return new Response(JSON.stringify(pizzeria), {
		status: 200,
		headers: { 'content-type': 'application/json' }
	});
}

// The DELETE function is called when a DELETE request is made to the endpoint
export async function DELETE({ params }) {
	const { uuid } = params;
	// Find the index of the pizzeria with the given id
	const index = pizzerias.findIndex((p) => p.uuid === uuid);
	// Remove the pizzeria from the list
	pizzerias.splice(index, 1);
	// Write the updated list to the pizzerias.json file
	await fs.writeFile('./pizzerias.json', JSON.stringify(pizzerias, null, 2));
	// Return a 204 No Content response
	return new Response(null, { status: 204 });
}
