<?php

    $server = "localhost";
    $database = "####";
    $user = "####";
    $pwd = "####";

    try {
        $connection = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "<p>Es konnte keine Verbindung zur Datenbank hergestellt werden: " . $e->getMessage() . "</p>";
    }

?>