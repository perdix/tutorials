<?php
	include_once("connection.php");
	if (isset($_POST['deleteAll'])) {
		$statement = $connection->prepare("DELETE FROM items");
		$statement->execute();
	}
	if (isset($_POST['deleteItem'])) {
		$id = $_POST["id"];
		$statement = $connection->prepare("DELETE FROM items WHERE id=:id");
		$statement->execute(["id" => $id]);
	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<title>CRUD Example</title>
</head>
<body id="home">
	<main>
		<header>
			<h1>Item List</h1>
			<div>
				<form action="index.php" method="POST"><button name="deleteAll"><span class='material-symbols-outlined'>delete_sweep</span><span>Delete All</span></button></form>
				<a href="new.php"><span class='material-symbols-outlined'>add_circle</span><span>Add New Item</span></a>
			</div>
		</header>
		

		<div class="list">
		<?php
			$sql = "SELECT * from items";
			foreach ($connection->query($sql) as $row) {
				echo "<div>";
		    		echo "<h2>" . $row["name"] . "</h2>";
		    		echo "<p>" . $row["amount"] . "</p>";
		    		echo "<div class='right'>";
		    			echo "<a href='edit.php?id=" . $row["id"] . "'><span class='material-symbols-outlined'>edit</span><span>Edit</span></a>";
		   				echo "<form action='index.php' method='POST'><input type='hidden' name='id' value='" . $row["id"] . "'><button type='submit' name='deleteItem'><span class='material-symbols-outlined'>delete</span><span>Delete</span></button></form>";
		   			echo "</div>";
	    		echo "</div>";
			}
		?>
		</div>
	</main>
	
</body>
</html>