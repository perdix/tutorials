<?php
	include_once("connection.php");
	if (isset($_POST["newItem"])) {
		$name = $_POST["name"];
		$amount = $_POST["amount"];
		$sql = "INSERT INTO items (name, amount) VALUES (?, ?)";
		$statement = $connection->prepare($sql);
		$statement->execute([$name, $amount]);
		// Change to index page
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="Utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>New Item</title>
</head>
<body>

	<main>
		<h1>Add new item</h1>
		<form action="new.php" method="POST">

			<div>
				<label for="name">Name</label>
				<br>
				<input type="text" name="name" id="name" placeholder="Item name">
			</div>
			<br>
			<div>
				<label for="amount">Amount</label>
				<br>
				<input type="text" name="amount" id="amount" placeholder="Amount">
			</div>
			<br>
			<input type="submit" name="newItem" value="New Item">
		</form>


	</main>
	
</body>
</html>