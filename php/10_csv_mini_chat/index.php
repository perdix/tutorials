<!DOCTYPE html>
<html>
<head>
	<title>Mini-Chat</title>
	<style>
		body {
			margin: 0;
			display: grid;
			grid-template-columns: 1fr 2fr;
			min-height: 100vh;
		}
		.left {
			background-color: lightgrey;
			padding: 30px;
		}
		.right {
			padding: 30px;
		}
		.right h1 {
			font-size: 20px;
			margin: 0;
		}
		.right p {
			margin: 0;
		}
		.right section {
			border-top: 1px dashed black;
			padding-top: 5px;
			margin-bottom: 15px;
		}

	</style>
</head>
<body>

	<div class="left">
		<h1>Welcome to our chat!</h1>
		<form action="index.php" method="POST">
			<input type="text" name="username" placeholder="Your username">
			<input type="text" name="message" placeholder="Your message">
			<br>
			<br>
			<input type="submit" name="submit" value="Send message">
		</form>
		<?php
			if (isset($_POST["submit"])) {
				// We store the content in a csv file
				// CSV (Comma Separated Values) is like a spreasheet file
				// Each line is a row and columns are specified double quotes and separated with commas
				$filename = "chat.csv";
				$file = fopen($filename, "a");
				// We use single quotes to enclose the double qoutes.
				// Again we add a new line to the end to the line (works only with double quotes though)
				fwrite($file, '"' . $_POST["username"] . '" , "' . $_POST["message"] . '"' . "\n");
				echo "<p>Message was sent!</p>";
			}
		?>
	</div>

	<div class="right">
		<?php
			if (file_exists("chat.csv")) {
				$file = fopen("chat.csv", "r");
				// fgetcsv helps us to read the csv file line by line
				while (($data = fgetcsv($file)) !== FALSE) {
					echo "<section>";
					echo "<p>" . $data[0] . "writes: </p>";
					echo "<h1>" . $data[1] . "</h1>";
					echo "</section>";
				}
			}
		?>
	</div>







</body>
</html>