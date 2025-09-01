import { createConnection } from '$lib/db/mysql';
import { redirect } from '@sveltejs/kit';
import { put } from "@vercel/blob";
import { BLOB_READ_WRITE_TOKEN } from '$env/static/private';

export async function load() {
	let connection = await createConnection();
	let [locationRows] = await connection.execute('SELECT * FROM locations');
	let [categoryRows] = await connection.execute('SELECT * FROM categories');

	return {
		locations: locationRows,
		categories: categoryRows
	};
}

export const actions = {
	createEvent: async ({ request }) => {
		const formData = await request.formData();
        const uploadedImage = formData.get("image");
		const { url } = await put('EventApp/' + uploadedImage.name, uploadedImage, { access: "public", token: BLOB_READ_WRITE_TOKEN });


		const connection = await createConnection();

		const [result] = await connection.execute(
			'INSERT INTO events (title, description, start_date, end_date, url, start_time, location_id, category_id, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)',
			[
				formData.get('title'),
				formData.get('description'),
				formData.get('startDate'),
				formData.get('endDate'),
				formData.get('url'),
				formData.get('startTime'),
				formData.get('locationId'),
				formData.get('categoryId'),
				url
			]
		);
		if (result.affectedRows) {
			redirect(303, '/admin/events');
		}
	}
};
