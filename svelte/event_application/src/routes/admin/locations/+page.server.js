import { createConnection } from '$lib/db/mysql';
import { fail } from '@sveltejs/kit';

export async function load() {
	let connection = await createConnection();
	let [rows] = await connection.execute('SELECT * FROM locations');

	return {
		locations: rows
	};
}

export const actions = {
	deleteLocation: async ({ request }) => {
		const formData = await request.formData();
		const id = formData.get('id');
		const connection = await createConnection();
		try {
			await connection.execute('DELETE FROM locations WHERE id = ?', [id]);
		} catch (e) {
			console.error(e);
			return {
				success: false,
				message: 'Deletion not possible!'
			};
		}
	}
};
