<?php

  // If a GET request is made
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $students = array("Klaudia", "Edona", "Visar", "Endri", "Ijon", "Irsa", "Kejti", "Iris");
    $random_key = array_rand($students);
    $random_student = $students[$random_key];
    // Return a JSON
    echo json_encode(
                    array("status" => "success",
                          "student" => $random_student)
                     );
  }

?>