import pizzerias from './pizzerias.json';
import { promises as fs } from 'fs';

// The GET function is called when a GET request is made to the endpoint
export async function GET() {
	// Return a 200 OK response with all pizzerias as JSON
	return new Response(JSON.stringify(pizzerias), {
		status: 200,
		headers: { 'content-type': 'application/json' }
	});
}

// The POST function is called when a POST request is made to the endpoint
// It expects a JSON body with the data of the new pizzeria
export async function POST({ request }) {
	// Get the JSON data from the request
	const data = await request.json();
	// Generate a new UUID for the pizzeria
	data.uuid = crypto.randomUUID();
	// Add a new pizzeria to the list
	pizzerias.push(data);
	// Write the updated list to the pizzerias.json file
	await fs.writeFile('./pizzerias.json', JSON.stringify(pizzerias, null, 2));
	// Return a 201 Created response with the new pizzeria as JSON
	return new Response(JSON.stringify(pizzerias), {
		status: 201,
		headers: { 'content-type': 'application/json' }
	});
}
