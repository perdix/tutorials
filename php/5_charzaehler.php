<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Charzähler - Iteration über eine Liste an Namen</title>
</head>

<body>
<?php

$names = ["Mario", "Alexander", "Steven", "Maria", "Hannah", "Nora"];
$char_count = 0;

foreach ($names as $name) {
    $char_count = $char_count + strlen($name);
}

echo "Char count: " . $char_count;
?>

</body>

</html>
