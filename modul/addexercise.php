<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/database/database.php');

 $exercise = $_POST["exercise"];


$query = "INSERT INTO tb_exercise(name) VALUES (?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $exercise);
$stmt->execute();
$mysqli->close();
echo "New record created successfully";
