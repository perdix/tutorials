<?php
	include_once("connection.php");
	if (isset($_POST["editItem"])) {
		$name = $_POST["name"];
		$amount = $_POST["amount"];
		$id = $_POST["id"];
		$sql = "Update items SET name = :name, amount = :amount WHERE id = :id";
		$statement = $connection->prepare($sql);
		$statement->execute(["name" => $name, "amount" => $amount, "id" => $id]);
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
	<title>Edit Item</title>
</head>
<body>

	<main>
		<h1>Edit item</h1>

		<?php 
			$id = $_GET["id"];
			$sql = "SELECT * FROM items WHERE id = :id";
			$statement = $connection->prepare($sql);
			$statement->execute(["id" => $id]);
			$item = $statement->fetch();
		?>

		<form action="edit.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
			<div>
				<label for="name">Name</label>
				<br>
				<input type="text" name="name" id="name" placeholder="Item name" value="<?php echo $item["name"]; ?>">
			</div>
			<br>
			<div>
				<label for="amount">Amount</label>
				<br>
				<input type="text" name="amount" id="amount" placeholder="Amount" value="<?php echo $item["amount"]; ?>">
			</div>
			<br>
			<input type="submit" name="editItem" value="Edit Item">
		</form>


	</main>
	
</body>
</html>