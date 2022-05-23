<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Loops</title>
</head>

<body>

	<h1>Loops</h1>

	<h2>The while loop</h2>
	<?php
		$x = 1;
		while($x <= 5) {
		  echo "The number is: $x <br>";
		  $x++;
		}
	?>

	<h2>The for loop</h2>
	<?php
		for ($x = 0; $x <= 10; $x++) {
  			echo "The number is: $x <br>";
		}
	?>

	<h2>The foreach loop</h2>
	<?php
		// With the foreach loop, we can iterate easily through an (associative) array
		$ageList = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
		foreach($ageList as $key => $value) {
		  echo "$key is $value years old!<br>";
		}
	?>


</body>

</html>
