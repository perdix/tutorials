<!DOCTYPE html>
<html>
<head>
    <title>Include files with PHP</title>
    <style>
        main {
            margin-top: 20px;
            margin-bottom: 20px;
            border-top: 1px dotted black;
            border-bottom: 1px dotted black;
        }
    </style>

</head>
<body>

<?php include_once "nav.html"; ?>

<main>
    <h1>The navigation is included above, the script is included below!</h1>
    <p>You can include whatever you want. The browser will find the included part and will show it at the given place. This is very useful if you want to reuse parts on several places at once.</p>
</main>

<?php include_once "script.php"; ?>

</body>
</html>