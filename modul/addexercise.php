<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "m151_project";
// Create connection
//
 $exercise = $_POST["exercise"];
 echo $exercise;
//
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO tb_exercise (name) VALUES ('$exercise')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
