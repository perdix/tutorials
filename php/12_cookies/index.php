<?php
	if (isset($_POST["submit"])) {
		// Setcookie is a function to save a cookie
		// Basically it makes a cookie request at the browser with the HTTP answer
		// It needs a name, a content to store and the unix time (how long it should be valid)
		// time()+60 stores the cookie for 60s
		setcookie("username", $_POST["username"], time()+60, "/");
		// As the cookie request will be fullfilled after the rendering, we can set the cookie variable for the first time manually ourselves to have it available right now!
		$_COOKIE["username"] = $_POST["username"];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cookie</title>
	<style type="text/css">
		body {
			background-color: lightgrey;
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
		}
	</style>
</head>
<body>

	<main>
	<h2>Cookies store information in the browser</h2>
	<?php
		if (isset($_COOKIE["username"])) {
			echo "<h1>";
			echo "Hallo " . $_COOKIE["username"];
			echo "</h1>";
		} else {
			echo "<h1>";
			echo "What is your name?";
			echo "</h1>";
			echo "<form action='index.php' method='POST'>";
			echo "<input type='text' name='username'>";
			echo "<input type='submit' name='submit'>";
			echo "</form>";
		}
	?>
	</main>

</body>
</html>