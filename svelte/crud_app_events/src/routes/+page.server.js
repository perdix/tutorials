import { createConnection } from '$lib/db/mysql';

export async function load({ locals }) {
	let connection = await createConnection();
	let [rows] = await connection.execute(
		'SELECT e.id, e.category_id, e.title, e.description, e.start_date, l.name as locationName, c.name as categoryName, e.image FROM events as e LEFT JOIN locations as l ON e.location_id = l.id LEFT JOIN categories as c ON e.category_id = c.id ORDER BY start_date DESC'
	);
	let [categories] = await connection.execute('SELECT * FROM categories');

	return {
		events: rows,
		categories: categories,
		user: locals.user
	};
}
