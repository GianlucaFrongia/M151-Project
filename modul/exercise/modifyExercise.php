<?php

	include("./../session.php");
	include("./../../database/database.php");

	if($_POST["toDo"] == "addExercise"){
		
		$name = $_POST["name"];
        $description = $_POST["description"];
        $muscles = $_POST["muscles"];
        
        
        $stmt = $mysqli->prepare("INSERT INTO tb_exercise(name, user_id, description) VALUES (?, ?, ?);");
        $stmt->bind_param("sis", $name, $userid, $description);
        $stmt->execute();
        
        $getRowId = mysqli_query($mysqli, "SELECT MAX(id) FROM tb_exercise;");
        $exerciseTableId = (($getRowId->fetch_assoc())['MAX(id)']);
        
        
        foreach($muscles as $value){
            $stmt = $mysqli->prepare("INSERT INTO tb_exercisehasmuscle(exercise_id, muscle_id) VALUES (?, ?);");
            $stmt->bind_param("ii",  $exerciseTableId, $value);
            $stmt->execute();
        }
		
	}
    
    if($_POST["toDo"] == "deleteExercise"){
        
        $exerciseID = $_POST["exercise"];
        
        $stmt = $mysqli->prepare("DELETE FROM `tb_planhasexercise` WHERE `exercise_id` = ?;");
        $stmt->bind_param("i",  $exerciseID);
        $stmt->execute();
        
        $stmt = $mysqli->prepare("DELETE FROM `tb_exercisehasmuscle` WHERE `exercise_id` = ?;");
        $stmt->bind_param("i",  $exerciseID);
        $stmt->execute();
        
        $stmt = $mysqli->prepare("DELETE FROM `tb_exercise` WHERE `id` = ?;");
        $stmt->bind_param("i",  $exerciseID);
        $stmt->execute();
        
    }

    if($_POST["toDo"] == "addMuscle"){
        
        $exerciseID = $_POST["exercise"];
        $muscleID = $_POST["muscleID"];
        
        $stmt = $mysqli->prepare("INSERT INTO tb_exercisehasmuscle(exercise_id, muscle_id) VALUES (?, ?);");
        $stmt->bind_param("ii", $exerciseID, $muscleID);
        $stmt->execute();
        
    }
    
    if($_POST["toDo"] == "deleteMuscle"){
        
        $exerciseID = $_POST["exercise"];
        $muscleID = $_POST["muscleID"];
        
        $stmt = $mysqli->prepare("DELETE FROM `tb_exercisehasmuscle` WHERE `exercise_id` = ? AND `muscle_id` = ?;");
        $stmt->bind_param("ii", $exerciseID, $muscleID);
        $stmt->execute();
        
    }

    if($_POST["toDo"] == "changeDescription"){
        
        $exercise = $_POST["exerciseID"];
        $description = $_POST["newDescription"];
        
        $stmt = $mysqli->prepare("UPDATE `tb_exercise` SET `description` = ? WHERE id = ?;");
        $stmt->bind_param("si", $description, $exercise);
        $stmt->execute();
        
    }
?>