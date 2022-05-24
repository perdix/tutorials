<?php

include_once("connection.php");

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$amount = $_POST['amount'];
	$sql = "INSERT INTO items (name, amount) VALUES (?, ?)";
	$statement = $connection->prepare($sql);
	$statement->execute([$name, $amount]);
}

// Execute a delete statement if the delete form is submitted
if (isset($_POST['deleteAll'])) {
	$sql = "DELETE FROM items";
	$statement = $connection->prepare($sql);
	$statement->execute();
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Shopping list</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
		}
		main {
			background-color: lightgrey;
			padding: 50px;
		}
		header {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		form {
			display: inline-block;
		}
		button, input[type="submit"] {
			cursor: pointer;
		}
		li span.material-symbols-outlined {
			font-size: 18px;
		}
	</style>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
	<main>
	<header>
		<h1>Shopping list</h1>
		<form action="index.php" method="POST">
			<button type="submit" name="deleteAll"><span class="material-symbols-outlined">delete_sweep</span></button>
		</form>
	</header>

	<hr>
	<form action="index.php" method="POST">
		<input type="text" name="name" placeholder="Product name">
		<input type="text" name="amount" placeholder="Amount">
		<input type="submit" name="submit" value="New Product">
	</form>


	<hr>


	<ul>
		<?php
			$sql = "SELECT * FROM items";
			foreach ($connection->query($sql) as $row) {
	    		echo "<li>" . $row["amount"] . " of " . $row["name"] . "</li>";
			}
		?>
	</ul>

	</main>

</body>
</html>