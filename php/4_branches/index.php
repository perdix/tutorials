<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Greeting</title>
</head>

<body>
	<?php
		// Date is a built-in function of PHP, date('G') gives you the current hour of a day
		if(date("G") < 10) {
			$greeting= "Good morning!";
		}
		if(date("G") <= 18 && date("G") >= 10) {
			$greeting= "Hello!";
		}
		if(date("G") >= 19) {
			$greeting= "Good evening!";
		}
		
		echo $greeting;
	?>

</body>

</html>
