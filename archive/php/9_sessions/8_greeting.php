<?php
// If POST request was sent
if (isset($_POST["submit"])) {
    // Set cookie
    setcookie("name", $_POST["first_name"], time() + 60*60, "/");
    // Set cookie variable that it works also for the first time
    $_COOKIE['name'] = $_POST["first_name"];
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Begrüßung mit Cookie</title>
    <style type="text/css">
        body {
            background-color: lightblue;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        h1, form {
            margin-top: -100px;
        }
    </style>
</head>
<body>

<?php
// Show form if cookie is not set
if (!isset($_COOKIE['name'])) {
    echo "<form action='8_greeting.php' method='POST'>";
    echo "<h2> Bitte Namen angeben! </h2>";
    echo "<input type='text' name='first_name'>";
    echo "<input type='submit' name='submit'>";
    echo "</form>";
// Show greeting if cookie is set
} else {
    echo "<h1> Hallo " . $_COOKIE['name'] . " </h1>";
}

?>

</body>
</html>