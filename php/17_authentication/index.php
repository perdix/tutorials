<?php
	session_start();
    if(!isset($_SESSION["username"])) {
        header("location:login.php");
        exit();
    }

	if(isset($_POST['submit'])) {
	    session_destroy();
	    unset($_SESSION['username']);
	    header('location:login.php');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Secret Page</title>
</head>
<body>
	<main>	
		<h1>Login successful!</h1>
		<?php echo "<h2>Welcome " . $_SESSION["username"]  . "!</h2>"?>
		<p>This is super secret!</p>

		<form action="index.php" method="POST">
			<input type="submit" name="submit" value="Logout">
		</form>
	</main>
</body>
</html>