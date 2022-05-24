<?php

	if (isset($_POST["submit"])) {
		$tmp_image = $_FILES["uploadedImage"]["tmp_name"];
		// uploads is the folder where to store all uploaded images
	    // Make sure this folder is already there and has got writing rights!
		$saved_image = "uploads/" . $_FILES["uploadedImage"]["name"];
		move_uploaded_file($tmp_image, $saved_image);
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image Share</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
	<form action="index.php" method="POST" enctype="multipart/form-data">
		<h1>Image Upload</h1>
		<div>
			<input type="file" name="uploadedImage">
			<input type="submit" name="submit">
		</div>
	</form>
</header>

<main>

	<?php
		// Get all images of the uploads folder
		$list_of_images = glob('uploads/*.{jpeg,gif,png}', GLOB_BRACE);
		$count = count($list_of_images);
		// Show all images
		for ($i=0; $i < $count; $i++) { 
			// Add the download attribute to directly download the images on click
			echo "<a download href='". $list_of_images[$i] ."'> <img src='" . $list_of_images[$i] . "' alt='uploadedImage'></a>";
		}

	?>
	
</main>

</body>
</html>