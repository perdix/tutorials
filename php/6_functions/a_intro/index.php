<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP functions</title>
</head>
<body>
	<h1>PHP functions</h1>

	<?php
		// Defines the function
		function writeMsg() {
		  echo "<p>Hello world!</p>";
		}
		// Calls the function
		writeMsg();


		// Functions can have a return value
		function addNumbers($a, $b) {
			$c = $a + $b;
			return $c;
		}
		echo addNumbers(3,5);

	?>



</body>
</html>