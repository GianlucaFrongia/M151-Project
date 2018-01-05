<?php

    include("./../session.php");
	include("./../../database/database.php");

    if($_POST["toDo"] == "addPlan"){
        
        $planName = $_POST["planName"];
        $planDescription = $_POST["planDescription"];
        $exercises = $_POST["exercises"];
        
        $stmt = $mysqli->prepare("INSERT INTO tb_plan(name, description, creator) VALUES (?, ?, ?);");
        $stmt->bind_param("ssi", $planName, $planDescription, $userid);
        $stmt->execute();
        
        $getRowId = mysqli_query($mysqli, "SELECT MAX(id) FROM tb_plan;");
        $planTableId = (($getRowId->fetch_assoc())['MAX(id)']);
        
        foreach($exercises AS $value){
            
            $stmt = $mysqli->prepare("INSERT INTO tb_planhasexercise(plan_id, exercise_id, repetitions, sets) VALUES (?, ?, ?, ?);");
            $stmt->bind_param("iiii", $planTableId, $value[0], $value[1], $value[2]);
            $stmt->execute();
            
        }
        
    }
    
    if($_POST["toDo"] == "changePlan"){
        
        $planID = $_POST["planID"];
        $newDescription = $_POST["newDescription"];
        $newExercises = $_POST["newExercises"];
        
        $stmt = $mysqli->prepare("UPDATE tb_plan SET description = ? WHERE id = ?;");
        $stmt->bind_param("si", $newDescription, $newDescription);
        $stmt->execute();
        

        
        foreach($newExercises AS $value){
            
            $stmt = $mysqli->prepare("UPDATE tb_planhasexercise SET repetitions = ?, sets = ? WHERE id = ?;");
            $stmt->bind_param("iii", $value[1], $value[2], $value[0]);
            $stmt->execute();
            
        }
        
    }
    
    if($_POST["toDo"] == "deletePlan"){
        
        $planID = $_POST["planID"];
        
        $stmt = $mysqli->prepare("DELETE FROM `tb_userhasfavorite` WHERE `plan_id` = ?;");
        $stmt->bind_param("i",  $planID);
        $stmt->execute();
        
        $stmt = $mysqli->prepare("DELETE FROM `tb_planhasexercise` WHERE `plan_id` = ?;");
        $stmt->bind_param("i",  $planID);
        $stmt->execute();
        
        $stmt = $mysqli->prepare("DELETE FROM `tb_plan` WHERE `id` = ?;");
        $stmt->bind_param("i",  $planID);
        $stmt->execute();
        
    }

?>