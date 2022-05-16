<?php

// Specify full destination filename


if(isset($_POST["submit"])) {
	// Check if file already exists

	$target_file = "uploads/" . "background.jpg";


    // Move file from temporary folder
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	echo "The file has been uploaded.";
	} else {
	echo "Sorry, there was an error uploading your file.";
	}
	
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File Upload</title>
	<style>

		body {
		

			background-image: url("uploads/background.jpg");
			background-position: center;
			background-size: cover;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			overflow: hidden;
		}

		div {
			background-color: rgba(255,255,255,0.6);
			padding: 100px;
			border-radius: 20px;
		}
		input {
			padding: 10px;
		}
		input[type="file"] {
			padding-left: 0;
		}
	</style>
</head>
<body>

	<div>
		<h1>Image Upload</h1>
		<form action="index.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="fileToUpload" id="fileToUpload">
			<br>
			<input type="submit" value="Upload Image" name="submit">
		</form>
	</div>
	






</body>
</html>