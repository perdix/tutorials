<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dynamische generiertes Schachbrett</title>
</head>

<body>

<table style="border:1px solid black;padding:0;border-spacing:0;">
<?php
for ($row = 1; $row <= 8; $row++) {
    echo "<tr>";
    for ($column = 1; $column <= 8; $column++) {
        $total = $row + $column;
        if ($total % 2 == 0) {
            echo "<td style='background: black; height:50px; width: 50px;'> </td>";
        } else {
            echo "<td style='background: white; height:50px; width: 50px;'> </td>";
        }
    }
    echo "</tr>";
}
?>
</table>

</body>

</html>