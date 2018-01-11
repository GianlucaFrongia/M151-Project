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
    
	//Plan hinzufügen
    if($_POST["toDo"] == "addPlan"){
        
		//Variabeln auslesen
        $planName = test_input($_POST["planName"]);
        $planDescription = test_input($_POST["planDescription"]);
        $exercises = test_input($_POST["exercises"]);
        
		//Plan in der Datenbank eintragen
        $stmt = $mysqli->prepare("INSERT INTO tb_plan(name, description, creator) VALUES (?, ?, ?);");
        $stmt->bind_param("ssi", $planName, $planDescription, $userid);
        $stmt->execute();
        
		//Die generierte ID des eingetragenen Plans auslesen
        $getRowId = mysqli_query($mysqli, "SELECT MAX(id) FROM tb_plan;");
        $planTableId = (($getRowId->fetch_assoc())['MAX(id)']);
        
		//Jeden Wert im $exercises Array soll in der Datenbank gespeichert werden (tb_planhasexercise)
        foreach($exercises AS $value){
            
			//Eintrag in der Datenbank speichern
            $stmt = $mysqli->prepare("INSERT INTO tb_planhasexercise(plan_id, exercise_id, repetitions, sets) VALUES (?, ?, ?, ?);");
            $stmt->bind_param("iiii", $planTableId, $value[0], $value[1], $value[2]);
            $stmt->execute();
            
        }
        
    }
    
	//Speichern der geänderten Werte in vorhandemen Plan
    if($_POST["toDo"] == "changePlan"){
        
		//Variabeln auslesen
        $planID = test_input($_POST["planID"]);
        $newDescription = test_input($_POST["newDescription"]);
        $newExercises = test_input($_POST["newExercises"]);
        
		//Planbeschreibung in der Datenbank updaten
        $stmt = $mysqli->prepare("UPDATE tb_plan SET description = ? WHERE id = ?;");
        $stmt->bind_param("si", $newDescription, $newDescription);
        $stmt->execute();
        
		//Jeden Wert im $newExercises Array in der Datenbank speichern (tb_planhasexercise)
        foreach($newExercises AS $value){
            
			//Werte in der Datenbank updaten
            $stmt = $mysqli->prepare("UPDATE tb_planhasexercise SET repetitions = ?, sets = ? WHERE id = ?;");
            $stmt->bind_param("iii", $value[1], $value[2], $value[0]);
            $stmt->execute();
            
        }
        
    }
    
	//Plan aus der Datenbank löschen
    if($_POST["toDo"] == "deletePlan"){
        
		//Variabeln auslesen
        $planID = test_input($_POST["planID"]);
        
		//Plan aus der Tabelle mit den Favoriten löschen
        $stmt = $mysqli->prepare("DELETE FROM `tb_userhasfavorite` WHERE `plan_id` = ?;");
        $stmt->bind_param("i",  $planID);
        $stmt->execute();
        
		//Plan aus der Tabelle mit den Übungen löschen
        $stmt = $mysqli->prepare("DELETE FROM `tb_planhasexercise` WHERE `plan_id` = ?;");
        $stmt->bind_param("i",  $planID);
        $stmt->execute();
        
		//Plan aus der Datenbank löschen
        $stmt = $mysqli->prepare("DELETE FROM `tb_plan` WHERE `id` = ?;");
        $stmt->bind_param("i",  $planID);
        $stmt->execute();
        
    }

?>