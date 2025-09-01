import { createConnection } from '$lib/db/mysql';
import { redirect } from '@sveltejs/kit';

export async function load({ params }) {

	const connection = await createConnection();
	const [rows] = await connection.execute('SELECT * FROM categories WHERE id = ?', [params.id]);
	return { category: rows[0] };
}


export const actions = {
	updateCategory: async ({ request }) => {
		const formData = await request.formData();
		const connection = await createConnection();
		const [result] = await connection.execute(
			'UPDATE categories SET name = ?, description = ? WHERE id = ?',
			[formData.get('name'), formData.get('description'), formData.get('id')]
		);
		if (result.affectedRows) {
			redirect(303, '/admin/categories');
		}
	}
};
