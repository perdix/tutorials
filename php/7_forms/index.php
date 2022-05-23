<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
</head>
<body>

	<h1>How to use a form</h1>
	<!-- 
	Action: Where the form is sent: In our case the same file
	Method: Which method is used (POST, GET). We use POST
	-->
	<form action="index.php" method="POST">
		<p>Please enter your name and press submit!</p>
		<!-- The name is really important, it defines the index name of the sent result! -->
		<input type="text" name="firstname" placeholder="Your name!">
		<input type="submit" name="submit" value="Submit">
	</form>

	<h2>
		<?php
			// $_POST is a global variable filled with items from a POST request
			// We check if the the button is given (that means, if the POST request was sent and thus POST values are given)
			if (isset($_POST["submit"])) {
			    echo "You submitted your form and entered: " . $_POST["firstname"];  

			} else {    
			    echo "Please press submit! ";
			}


		?>
	</h2>
	
</body>
</html>