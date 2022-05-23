<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File Upload</title>
	<style>

		body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
		}
		div {
			background-color: rgba(200,200,200);
			padding: 100px;
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
		<h1>File Upload</h1>
		<!-- if we use the file input, we need to give the enctype attribut! -->
		<form action="index.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="fileToUpload" id="fileToUpload">
			<br>
			<input type="submit" value="Upload image" name="submit">
		</form>
	</div>

	<?php

		if(isset($_POST["submit"])) {
			
			// Hav a detailed look on the sent $_FILES arrayx
			echo "<pre>";
			var_dump($_FILES);
			echo "</pre>";


			// The full name of the new file (how it should be named and where it should be saved)
			// Make sure you have writing rights on the folder you specify!
			$target_file = "uploads/" . "background.jpg";

		    // Move file from the temporary folder to the path you have given
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    	echo "The file has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
			
		}

	?>
	

</body>
</html>