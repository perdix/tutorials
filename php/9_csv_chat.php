<!DOCTYPE html>
<html lang="de">
<head>
    <title>Feedback</title>
</head>
<body>

<form action="9_csv_chat.php" method="POST">
    <input type="text" name="title">
    <textarea name="message">
		Meine Nachricht
	</textarea>
    <input type="submit" name="submit">
</form>
<?php
if (isset($_POST["submit"])) {
    $file_name = 'chat.csv';
    $title = trim(htmlspecialchars($_POST["title"]));
    $message = trim(htmlspecialchars(str_replace(array("\n", "\r"), " ", $_POST["message"])));
    $myfile = fopen($file_name, 'a') or die('Cannot open file: '. $file_name);
    fwrite($myfile, "\"" . $title . "\", \"" . $message . "\"\n" );
    echo "Nachricht gesendet!";
}
?>

<h1>Chat</h1>

<?php
if (file_exists("feedback.csv")) {
    $handle = fopen("feedback.csv", "r");
    while (($data = fgetcsv($handle)) !== FALSE) {
        echo "<h2>" . $data[0] . "</h2>";
        echo "<p>" . $data[1] . "</p>";
    }
}

?>

</body>
</html>