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
    
	//Favoriten hinzufügen
    if($_POST['toDo'] == "addFav"){
        
		//Variabeln auslesen
        $planID = test_input($_POST["planID"]);
        
		//Favoriteneintrag in der Datenbank abspeichern
        $stmt = $mysqli->prepare("INSERT INTO `tb_userhasfavorite` (`user_id`, `plan_id`) VALUES (?, ?);");
        $stmt->bind_param("ii", $userid, $planID);
        $stmt->execute();
        
    }
    
	//Favoriten löschen
    if($_POST['toDo'] == "deleteFav"){
        
		//Variabeln auslesen
        $planID = test_input($_POST["planID"]);
        
		//Favoriteneintrag in der Datenbank löschen
        $stmt = $mysqli->prepare("DELETE FROM `tb_userhasfavorite` WHERE user_id = ? AND plan_id = ?;");
        $stmt->bind_param("ii", $userid, $planID);
        $stmt->execute();
        
    }

?>