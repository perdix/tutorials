<?php

  $students = array("Klaudia",  
                    "Edona", 
                    "Visar", 
                    "Endri", 
                    "Ijon", 
                    "Irsa", 
                    "Kejti",
                    "Iris",
                    "Ersi",
                    "Samed",
                    "Egi",
                    "Alberta",
                    "Leandra",
                    "Rafael", 
                    "Tea");

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $random_key = array_rand($students);
    $random_student = $students[$random_key];

    echo json_encode(
                    array("status" => "success",
                          "student" => $random_student)
                     );
  }



?>