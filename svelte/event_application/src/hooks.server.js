import { createConnection } from '$lib/db/mysql';

export const handle = async ({ event, resolve }) => {
	// get cookies from browser
	const session = event.cookies.get('session');

	if (!session) {
		// if there is no session load page as normal
		return await resolve(event);
	}

	// find the user based on the session
	const db = await createConnection();
	const [users] = await db.execute('SELECT * FROM users WHERE session_token = ?', [session]);
	if (users.length === 0) {
		// if no user is found remove the session cookie
		event.cookies.set('session', '', {
			maxAge: -1,
			path: '/'
		});
		return await resolve(event);
	}

	// if `user` exists set `events.local`
	event.locals.user = users[0];

	// load page as normal
	return await resolve(event);
};
