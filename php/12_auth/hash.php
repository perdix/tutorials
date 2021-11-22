<?php
error_reporting(-1);
ini_set('display_errors', 'On');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PW</title>
</head>
<body>
	<h1>Hashed Password</h1>
	<?php
		echo "test"
		echo password_hash("mytest", PASSWORD_DEFAULT);
	?>
</body>
</html>