<!DOCTYPE html>
<html lang="de">
<head>
    <title>Reverse a word!</title>
</head>
<body>

<h1>Reverse a word</h1>

<?php

# Test string
$word = "tree";
echo "<h2>" . $word . "</h2>";

# A function that reverses a string
function reverse($word){
    // Creates a empty array for the resulting letters 
    $result = array();
    # Loops from the end of the word to the start
    for ($i = strlen($word) - 1; $i >= 0; $i--) {
        array_push($result, $word[$i]);
    }
    # Array is joined to an string again
    return join("", $result);
}

# Output of the result
echo "<h2>" . reverse($word) . "</h2>"

?>

</body>
</html>