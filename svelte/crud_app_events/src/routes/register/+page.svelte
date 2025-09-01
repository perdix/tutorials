<script>
	import { enhance } from '$app/forms';
	import Warning from '$lib/components/Warning.svelte';
	export let form;
</script>

<div>
	
	<form action="?/register" method="POST" use:enhance>
		<h1>Register</h1>

		<label for="email">E-Mail</label>
		<input type="text" name="email" id="email" required />

		<label for="username">Username</label>
		<input type="text" name="username" id="username" required />

		<label for="password">Password</label>
		<input type="password" name="password" id="password" required />

		<button type="submit">Register</button>

		{#if form}
			<Warning message={form.message} />
		{/if}
	</form>
</div>

<style>
	div {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
	}
	form {
		display: flex;
		flex-direction: column;
		gap: 10px;
	}
</style>
