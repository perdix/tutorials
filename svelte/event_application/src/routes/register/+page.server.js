import { register } from '$lib/db/auth';
import { redirect } from '@sveltejs/kit';

export const actions = {
	register: async ({ request, cookies }) => {
		const formData = await request.formData();
		const email = formData.get('email');
		const password = formData.get('password');
		const username = formData.get('username');

		const {token, message} = await register(email, username, password);

		if (token) {
			cookies.set('session', token, {
				maxAge: 60 * 60 * 24 * 7,
				path: '/',
				httpOnly: true,
				sameSite: 'strict'
			});
			redirect(302, '/');
		} else {
			return {
				success: false,
				message: message
			};
		}
	}
};
