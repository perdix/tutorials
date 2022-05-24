<?php
	session_start();

	if(isset(($_POST["username"])) && (isset($_POST["password"])) && (isset($_POST["password_repetition"]))) {

		$username = $_POST["username"];
		$password = $_POST["password"];
		$password_repetition = $_POST["password_repetition"];

		if ($password != $password_repetition) {
			$failedPassword = true;
		} 
		else {
			include_once("connection.php");
			$stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
			$stmt->execute(["username" => $username]);
			$user = $stmt->fetch();
			// Check is user already exists
			if ($user) {
				$failedUser = true;
			} else {
				// Add new user
				$pw_hash = password_hash($password, PASSWORD_DEFAULT);
				$statement = $connection->prepare("INSERT INTO users (username, role, pw_hash) VALUES (:username, 'admin', :pw_hash)");
				$statement->execute(["username" => $username, "pw_hash" => $pw_hash]);
				// Login and redirect
				$_SESSION["username"] = $username;
		    	$_SESSION["role"] = "admin";
		    	header("location:index.php");
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Register</title>
</head>
<body>

	<main>
		<h1>Register Page</h1>

		<form action="register.php" method="POST">
			
			<div>
				<label for="username">Register</label>
				<br>
				<input type="text" id="username" name="username">
			</div>

			<div>
				<label for="password">Password</label>
				<br>
				<input type="password" id="password" name="password">
			</div>

			<div>
				<label for="password_repetition">Repeat Password</label>
				<br>
				<input type="password" id="password_repetition" name="password_repetition">
			</div>

			<br>
			<input type="submit" name="submit">

			<?php
				if (isset($failedPassword)) {
			        echo "<p>Passwords must be equal!</p>";
			    }
			  	if (isset($failedUser)) {
			        echo "<p>Username is already used! Please choose a different one!</p>";
			    }
    		?>


		</form>
	</main>


</body>
</html>