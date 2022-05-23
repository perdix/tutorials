<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Calculation with PHP</title>
</head>

<body>
   <?php
      // Variables are declared with a dollar sign
      $x = 10;
      $y = 15;
      $z = $x + $y;

      echo "<p>";
    
      // var_dump shows the variable an the type at the same time. 
      // It is normally used for debugging.
      var_dump($x);
      echo "<br>";
      var_dump($y);
      echo "<br>";
      var_dump($z);

      echo "</p>";
   ?>
</body>

</html>
