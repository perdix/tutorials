<?php



session_start();

$loginFail = false;

if(isset($_POST["username"]) && isset($_POST["password"])) {

	include_once "connection.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $connection->prepare("SELECT id, username, pw_hash, role FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $rowCount = count($result);
    $row = $result[0];

    if($rowCount > 0 && password_verify($password, $row["pw_hash"])) {
    
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];
        header("location:secret.php");
        exit();
         
    } else {
    	$loginFail = true;
    }
    $connection = null;
  
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<h1>Login-Seite</h1>

	<form action="login.php" method="POST">
		
		<div>
			<label for="username">Username</label>
			<input type="text" id="username" name="username">
		</div>

		<div>
			<label for="password">Password</label>
			<input type="text" id="password" name="password">
		</div>

		<input type="submit" name="submit">

	</form>

	<?php

		if($loginFail) {
	        echo "<p>Email oder Passwort falsch! Versuchen Sie es erneut!</p>";
	    }
    ?>

</body>
</html>