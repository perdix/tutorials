import { createConnection } from '$lib/db/mysql';
import bcrypt from 'bcrypt';

export let login = async (email, password) => {
	let connection = await createConnection();

	// Find user with email
	let [users] = await connection.query('SELECT * FROM users WHERE email = ?', [email]);
	if (users.length === 0) {
		return null;
	}

	// Check password
	if (!(await bcrypt.compare(password, users[0].password_hash))) {
		return null;
	}

	// Create token
	const token = crypto.randomUUID();
	// Create expiration date (1 week)
	let expires = new Date();
	expires.setDate(expires.getDate() + 7);

	// Save token
	let [result] = await connection.execute(
		'UPDATE users SET session_token = ?, session_expiration = ? WHERE id = ?',
		[token, expires, users[0].id]
	);
	if (result.affectedRows === 0) {
		return null;
	}

	// Return token
	return token;
};

export let register = async (email, username, password) => {
	let connection = await createConnection();
	let hashedPassword = await hashPassword(password);

	// Check if email is already in use
	let [users] = await connection.query('SELECT * FROM users WHERE email = ?', [email]);
	if (users.length > 0) {
		return { token: null, message: 'Email already in use' };
	}

	// Check if username is already in use
	[users] = await connection.query('SELECT * FROM users WHERE username = ?', [username]);
	if (users.length > 0) {
		return { token: null, message: 'Username already in use' };
	}
	
	// Create user
	let [result] = await connection.execute('INSERT INTO users (email, username, password_hash, role) VALUES (?, ?, ?, ?)', [
		email,
		username,
		hashedPassword,
		"user"
	]);


	// Create token
	const token = crypto.randomUUID();

	// Create expiration date (1 week)
	let expires = new Date();
	expires.setDate(expires.getDate() + 7);

	// Save token
	await connection.query(
		'UPDATE users SET session_token = ?, session_expiration = ? WHERE id = ?',
		[token, expires, result.insertId]
	);

	// Return token
	return {
		token: token,
		message: 'User created'
	};
};



let hashPassword = async (password) => {
	return await bcrypt.hash(password, 12);
};
