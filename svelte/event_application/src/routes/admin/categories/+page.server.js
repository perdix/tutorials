import { createConnection } from '$lib/db/mysql';

export async function load() {
	let connection = await createConnection();
	let [rows] = await connection.execute('SELECT * FROM categories');

	return {
		categories: rows
	};
}

export const actions = {
	deleteCategory: async ({ request }) => {
		const formData = await request.formData();
		const id = formData.get('id');
		const connection = await createConnection();
		try {
			await connection.execute('DELETE FROM categories WHERE id = ?', [id]);
		} catch (e) {
			console.error(e);
			return {
				success: false,
				message: 'Deletion not possible!'
			};
		}
	}
};
