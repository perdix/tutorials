<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedback</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        form {
            background-color: lightgrey;
            padding: 50px;
        }
        div {
            background-color: lightgrey;
            margin-left: 50px;
            padding: 50px;
        }
        textarea {
            margin-bottom: 10px;
            height: 100px;
            display: block;
        }
    </style>
</head>
<body>

<form action="index.php" method="POST">
    <textarea name="message">My Message</textarea>
    <input type="submit" name="submit">

    <!-- Write to a file -->
    <?php
        if (isset($_POST["submit"])) {
            $file_name = 'messages.txt';
            // Clean up and make the written message safe to store
            $message = trim(htmlspecialchars(str_replace(array("\n", "\r"), " ", $_POST["message"])));
            // Open the file in append mode
            $myfile = fopen($file_name, 'a') or die('Cannot open file: '. $file_name);
            // Write the message to the file and add a new line afterwards
            fwrite($myfile, $message . "\n");
            fclose($myfile);
            echo "<p> Message was sent! </p>";
        }
    ?>
</form>

<div>
    
    <h2>Messages</h2>

    <!-- Read from a file -->
    <?php
        if (file_exists("messages.txt")) {
            // Open the file in read mode
            $myfile = fopen("messages.txt", "r");
            // Until the end is reached, read line by line
            while(!feof($myfile)) {
              echo "</p>" . fgets($myfile) . "</p>";
            }
            fclose($myfile);
        }
    ?>
</div>

</body>
</html>