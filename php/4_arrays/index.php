<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Tageszeitabhängige Begrüßung</title>
</head>

<body>
<?php
// Date ist eine built-in Funktion von PHP
if(date("G") < 10) {
	$greeting= "Guten Morgen!";
}
if(date("G") <= 18 && date("G") >= 10) {
	$greeting= "Guten Tag!";
}
if(date("G") >= 19) {
	$greeting= "Guten Abend!";
}
echo $greeting;
?>

</body>

</html>
