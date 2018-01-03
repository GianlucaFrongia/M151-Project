<?php

	include("./../session.php");
	include("./../../database/database.php");

	$error = "";
	$toDo = "";
	
	if (isset($_POST["toDo"])){
		$toDo = $_POST["toDo"];
	} else {
		echo ("Fehler in der Verarbeitung");
	}
	
	if($toDo == "deletePic"){
		
		$query = "UPDATE tb_user SET pbPath = NULL WHERE username='$username'";
		$stmt = $mysqli->prepare($query);
		$stmt->execute();
		$mysqli->close();
		
		
	}
	
	if($toDo == "saveChanges"){
	
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$email = $_POST["email"];
		
		
		
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		//Vor- und Nachname prüfen
		test_input($firstname);
		if (!empty($firstname)) {
			if (strlen($firstname) > 30) {
				$error = $error . "Der Benutzername is zu lang (Max. 30 Zeichen). <br>";
			} elseif (strlen($firstname) < 2) {
				$error = $error .  "Der Benutzername is zu kurz (Min 6 Zeichen). <br>";
			}
		} else {
			$error = $error .  "Es wurde kein Benutzername angegeben. <br>";
		}
		
		test_input($lastname);
		if (!empty($lastname)) {
			if (strlen($lastname) > 30) {
				$error = $error . "Der Benutzername is zu lang (Max. 30 Zeichen). <br>";
			} elseif (strlen($lastname) < 2) {
				$error = $error .  "Der Benutzername is zu kurz (Min 6 Zeichen). <br>";
			}
		} else {
			$error = $error .  "Es wurde kein Benutzername angegeben. <br>";
		}
		//Vor- und Nachname prüfen ende
		
		//E-Mail prüfen
		test_input($email);
		if (!empty($email)) {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = $error . "Die angegebene E-Mail Adresse ist ungültig.<br>";
			}
		} else {
			$error = $error . "Bitte E-mail Adresse angeben. <br>";
		}
		//E-Mail prüfen ende
		
		if($error){
			echo $error;
		} else {
			$query = "UPDATE tb_user SET firstname = ?, lastname= ?, email= ? WHERE username='$username'";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("sss", $firstname, $lastname, $email);
			$stmt->execute();
			$mysqli->close();
		}
		
		
	}

?>