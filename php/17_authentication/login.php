<?php
	session_start();

	if(isset($_POST["username"]) && isset($_POST["password"])) {

		include_once "connection.php";

	    $username = $_POST["username"];
	    $password = $_POST["password"];

	    // Try to find the user
	    $stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
	    $stmt->execute(["username" => $username]);
	    $user = $stmt->fetch();
	  	
	    if ($user) {
	    	if(password_verify($password, $user["pw_hash"])) {
		    	$_SESSION["username"] = $user["username"];
		    	$_SESSION["role"] = $user["role"];
		    	header("location:index.php");
		    } else {
		    	$failed = true;
		    }
	    } else {
	    	$failed = true;
	    }
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Login</title>
</head>
<body>
	<main>
		<h1>Login Page</h1>

		<form action="login.php" method="POST">
			<div>
				<label for="username">Username</label>
				<br>
				<input type="text" id="username" name="username">
			</div>

			<div>
				<label for="password">Password</label>
				<br>
				<input type="text" id="password" name="password">
			</div>

			<br>
			<input type="submit" name="submit" value="Login">
		</form>
		<p>New User? <a href="register.php">Register first</a></p>

		<?php
			if (isset($failed)) {
		        echo "<p>Login failed! Username or passwort is wrong!</p>";
		    }
	    ?>
    </main>

</body>
</html>