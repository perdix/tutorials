<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calculate the Absolute!</title>
</head>
<body>

<?php

// Implements the Math function absolute
// If a negative number is give, return the posivite equivalent
function absolute($number) {
    if ($number < 0) {
        return -$number;
    } else {
        return $number;
    }
}

$a = 5;
$b = -3;

// Prints the result with echo
echo "<p>Testausgabe: </p>";
// Use the function given by PHP itself
echo abs($a);
// Use the function we wrote ourselves
echo "<br>";
echo absolute($a);
echo "<br>";
echo abs($b);
echo "<br>";
echo absolute($b);

?>

</body>
</html>