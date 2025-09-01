<script>
	import { enhance } from '$app/forms';
	import Warning from '$lib/components/Warning.svelte';
	export let form;
</script>

<div>
	<form action="?/login" method="POST" use:enhance>

		<h1>Login</h1>


		<label for="eamil">E-Mail</label>
		<input type="text" name="email" id="email" required />

		<label for="password">Password</label>
		<input type="password" name="password" id="password" required />

		<button type="submit">Login</button>

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
