<?php

	//Session und Datenbankverbindung einbinden
	include("./../session.php");
	include("./../../database/database.php");

    //Werte trimmen und auf richtigkeit prüfen
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
	//Eine neue Übung hinzufügen
	if($_POST["toDo"] == "addExercise"){
		
		//Variabeln auslesen
		$name = test_input($_POST["name"]);
        $description = test_input($_POST["description"]);
        $muscles = test_input($_POST["muscles"]);
        
        //Übung in die Datenbank schreiben
        $stmt = $mysqli->prepare("INSERT INTO tb_exercise(name, user_id, description) VALUES (?, ?, ?);");
        $stmt->bind_param("sis", $name, $userid, $description);
        $stmt->execute();
        
		//Die ID der neuen Übung aus der Datenbank auslesen
        $getRowId = mysqli_query($mysqli, "SELECT MAX(id) FROM tb_exercise;");
        $exerciseTableId = (($getRowId->fetch_assoc())['MAX(id)']);
        
        //Jeden Eintrag im $muscles Array in der N:M tabelle tb_exercisehasmuscle speichern
        foreach($muscles as $value){
            $stmt = $mysqli->prepare("INSERT INTO tb_exercisehasmuscle(exercise_id, muscle_id) VALUES (?, ?);");
            $stmt->bind_param("ii",  $exerciseTableId, $value);
            $stmt->execute();
        }
		
	}
    
	//Übung aus der Datenbank löschen
    if($_POST["toDo"] == "deleteExercise"){
        
		//Variabeln auslesen
        $exerciseID = test_input($_POST["exercise"]);
        
		//Übung aus jedem Plan löschen
        $stmt = $mysqli->prepare("DELETE FROM `tb_planhasexercise` WHERE `exercise_id` = ?;");
        $stmt->bind_param("i",  $exerciseID);
        $stmt->execute();
        
		//Jeden Muskel aus der Übung entfernen
        $stmt = $mysqli->prepare("DELETE FROM `tb_exercisehasmuscle` WHERE `exercise_id` = ?;");
        $stmt->bind_param("i",  $exerciseID);
        $stmt->execute();
        
		//Übung löschen
        $stmt = $mysqli->prepare("DELETE FROM `tb_exercise` WHERE `id` = ?;");
        $stmt->bind_param("i",  $exerciseID);
        $stmt->execute();
        
    }

	//Muskel zu einer bestehenden Übung hinzufügen
    if($_POST["toDo"] == "addMuscle"){
        
		//Variabeln auslesen
        $exerciseID = test_input($_POST["exercise"]);
        $muscleID = test_input($_POST["muscleID"]);
        
		//Neuen Muskel in der Datenbank abspeichern
        $stmt = $mysqli->prepare("INSERT INTO tb_exercisehasmuscle(exercise_id, muscle_id) VALUES (?, ?);");
        $stmt->bind_param("ii", $exerciseID, $muscleID);
        $stmt->execute();
        
    }
    
	//Muskel aus bestehender Übung löschen
    if($_POST["toDo"] == "deleteMuscle"){
        
		//Variabeln auslesen
        $exerciseID = test_input($_POST["exercise"]);
        $muscleID = test_input($_POST["muscleID"]);
        
		//Muskel aus der Datenbank entfernen
        $stmt = $mysqli->prepare("DELETE FROM `tb_exercisehasmuscle` WHERE `exercise_id` = ? AND `muscle_id` = ?;");
        $stmt->bind_param("ii", $exerciseID, $muscleID);
        $stmt->execute();
        
    }

	//Beschreibung bei einer bestehenden Übung ändern
    if($_POST["toDo"] == "changeDescription"){
        
		//Variabeln auslesen
        $exercise = test_input($_POST["exerciseID"]);
        $description = test_input($_POST["newDescription"]);
        
		//Beschreibung in der Datenbank updaten
        $stmt = $mysqli->prepare("UPDATE `tb_exercise` SET `description` = ? WHERE id = ?;");
        $stmt->bind_param("si", $description, $exercise);
        $stmt->execute();
        
    }
	
?>