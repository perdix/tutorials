<?php
	session_start();

    if(!isset($_SESSION["username"])) {
        header("location:login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Secret Page</title>
</head>
<body>
	<h1>Secret Page</h1>
	<p>This is so super secret!</p>
	
</body>
</html>