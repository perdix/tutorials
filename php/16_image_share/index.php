<?php
	if (isset($_POST["submit"])) {

		//echo "<pre>";
		//var_dump($_FILES);
		//echo "</pre>";

		$tmp_image = $_FILES["uploadedImage"]["tmp_name"];
		$fixed_image = "uploads/" . $_FILES["uploadedImage"]["name"];
		move_uploaded_file($tmp_image, $fixed_image);
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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

		$folder = "uploads";
		$list_of_images = scandir($folder);
		array_shift($list_of_images);
		array_shift($list_of_images);
		$count = count($list_of_images);

		// Ausgabe der Bilder
		for ($i=0; $i < $count; $i++) { 
			echo "<a download href='uploads/". $list_of_images[$i] ."'> <img src='uploads/" . $list_of_images[$i] . "' alt='uploadedImage'></a>";
		}

	?>
	
</main>

</body>
</html>