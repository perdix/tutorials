<?php
    // Start the session of find a session if already there
    session_start();
    // Set session variables
    $_SESSION["favcolor"] = "green";
    if (!isset($_SESSION["start_time"])) {
        $_SESSION["start_time"] = time();
    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>
<body>

    <h1>Sessions</h1>
    <p>Sessions store information about a user on the Server.</p>
    <p>Sessions are identified via cookies (session ID) but the whole session content is only available on the server and cannot be changed by the user!</p>
    <p>A session is valid for a specified time</p>
    <p>Sessions are used to bind HTTP requests to a special user (e.g. Authentication,...), similar to Cookies but secure, because the information is stored on the server.
    </p>
    <a href="https://www.w3schools.com/php/php_sessions.asp">Read more</a>

    <hr>

        <?php
            // Echo session variables that were set on previous page
            echo "<p> Favorite color is " . $_SESSION["favcolor"] . "</p>";

            echo "<pre>";
            var_dump($_SESSION);
            echo "<pre>"

        ?>

</body>
</html>