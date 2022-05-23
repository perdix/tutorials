<?php

// Add to database after form submission
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$amount = $_POST['amount'];
	$sql = "INSERT INTO items (name, amount) VALUES (?, ?)";
	$statement = $connection->prepare($sql);
	$statement->execute([$name, $amount]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DB Connection</title>
</head>
<body>
	<h1>DB connections</h1>
	

	<?php
		// First, we need to establish a connection to a database
		// We use PDO (PHP Data Objects) to help us with that.
		// Create a database connection (Fill in correct values)
		$database = "####";
		$username = "####";
		$password = "####";
		$connection = new PDO("mysql:host=localhost;dbname={$database}", $username, $password);

		// We start a first query on the table items
		$sql = "SELECT * FROM items";
		// As long as rows are available, iterate and build some HTML with it.
		// The query gives an associative array. The array index names are the table column names!
		foreach ($connection->query($sql) as $row) {
    		echo "<p> . "$row["amount"] . " of " . $row["name"] . "</p>";
		}
	?>

	<!-- Form to add something to the database -->
	<form method="POST" action="index.php">
		<input type="text" name="name">
		<input type="text" name="amount">
		<input type="submit" name="submit">
	</form>


</body>
</html>