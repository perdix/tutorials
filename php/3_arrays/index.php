<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Arrays in PHP</title>
</head>

<body>

	<h1>There are two types of arrays in PHP</h1>

	<h2>Normal Arrays</h2>
	<?php
		$names = ["Drini", "Edona", "Alberta"];
		// $names = array("Drini", "Edona", "Alberta") creates the same array
		var_dump($names);
		echo "<br>";
		var_dump(count($names));
	?>
	<h2>Associative Arrays</h2>
	<?php
		// Associate arrays are arrays with names as indices. 
		$drini = ["firstname" => "Drini", "lastname" => "Beqiri"];
		var_dump($drini);
		echo "<br>";
		echo $drini["firstname"];
		echo "<br>";
		var_dump(count($drini));
	?>

</body>

</html>
