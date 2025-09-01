import { createConnection } from '$lib/db/mysql';
import { redirect } from '@sveltejs/kit';

export const actions = {
	logout: async ({ locals, cookies }) => {
		if (!locals.user) {
			redirect(302, '/');
		}

		//  Delete current session in the database
		let connection = await createConnection();
		await connection.execute(
			'UPDATE users SET session_token = NULL, session_expiration = NULL WHERE id = ?',
			[locals.user.id]
		);

		// Delete session cookie
		cookies.delete('session', { path: '/' });

		// Redirect to home page
		redirect(302, '/');
	},

	deleteAccount: async ({ locals, cookies }) => {
		if (!locals.user) {
			redirect(302, '/');
		}

		//  Delete current session in the database
		let connection = await createConnection();
		await connection.execute(
			'DELETE FROM users WHERE id = ?',
			[locals.user.id]
		);

		// Delete session cookie
		cookies.delete('session', { path: '/' });

		// Redirect to home page
		redirect(302, '/');
	}
};
