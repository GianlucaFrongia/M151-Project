<?php
	
	//Session und Datenbankverbindung einbinden
	include("./../session.php");
	include("./../../database/database.php");

	//Globale Variabeln initialisieren
	$error = "";
	$toDo = "";
	
    //Werte trimmen und auf Richtigkeit prüfen
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
    
	//$_GET Attribute auslesen
	if (isset($_POST["toDo"])){
		$toDo = $_POST["toDo"];
	} else {
		$error = $error . "Fehler in der Verarbeitung<br/>";
	}

	//Passwort ändern
	if($toDo == "changePass"){
		
		//Variabeln auslesen
		$password = test_input($_POST['password']);
		$password2 = test_input($_POST['password2']);
		
		//Passwörter prüfen (auf Länge, Inhalt und Gleichheit), und möglicherweise Fehlermeldung ausgeben
		if (!empty($password)) {
			if (strlen($_POST["password"]) < '8') {
				$error = $error .  "Das Passwort muss mind. 8 Zeichen lang sein. <br>";
			} elseif (!preg_match("#[0-9]+#", $password)) {
				$error = $error .  "Das Passwort muss mind. eine Nummer enthalten. <br>";
			} elseif (!preg_match("#[A-Z]+#", $password)) {
				$error = $error .  "Dein Passwort muss mind. einen Grossbuchstaben enthalten. <br>";
			} elseif (!preg_match("#[a-z]+#", $password)) {
				$error = $error .  "Dein Passwort muss mind. einen Kleinbuchstaben enthalten. <br>";
			}
		} else {
			$error = $error . "Bitte dein Passwort eingeben<br>";
		}
	
		if (empty($password2)) {
			$error = $error . "Bitte das Passwort wiederholen<br>";
		}
	
		if ($password !== $password2) {
			$error = $error . "Die Passwörter stimmen nicht überein<br>";
		}
		//Passwörter prüfen ende
		
		//Wenn kein Error besteht, soll das Passwort geändert werden
		if ($error) {
			echo $error;
		} else {
			
			//Salt generieren
			$bytes = random_bytes(22);
			$options = [
				'cost' => 11,
				'salt' => $bytes
			];
	
			//Passwort verschlüsseln
			$passwordhash = password_hash($password, PASSWORD_BCRYPT, $options);
			
			//Neues Passwort in der Datenbank updaten.
			$query = "UPDATE tb_user SET password = ? WHERE id=$userid";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("s", $passwordhash);
			$stmt->execute();
	
		}
		
	}
	
	//Bild entfernen (Dabei wird das Bild nicht gelöscht, sondern nur die Verlinkung aus der Datenbank entfernt)
	if($toDo == "deletePic"){
		
		$query = "UPDATE tb_user SET pbPath = NULL WHERE username='$username'";
		$stmt = $mysqli->prepare($query);
		$stmt->execute();
		$mysqli->close();
			
	}
	
	//Änderungen in die Datenbank schreiben
	if($toDo == "saveChanges"){
	
		$firstname = test_input($_POST["firstname"]);
		$lastname = test_input($_POST["lastname"]);
		$email = test_input($_POST["email"]);
		
		//Vor- und Nachname prüfen
		if (!empty($firstname)) {
			if (strlen($firstname) > 30) {
				$error = $error . "Der Vorname is zu lang (Max. 30 Zeichen). <br>";
			} elseif (strlen($firstname) < 2) {
				$error = $error .  "Der Vorname is zu kurz (Min 6 Zeichen). <br>";
			}
		} else {
			$error = $error .  "Es wurde kein Vorname angegeben. <br>";
		}
		
		if (!empty($lastname)) {
			if (strlen($lastname) > 30) {
				$error = $error . "Der Nachname is zu lang (Max. 30 Zeichen). <br>";
			} elseif (strlen($lastname) < 2) {
				$error = $error .  "Der Nachname is zu kurz (Min 6 Zeichen). <br>";
			}
		} else {
			$error = $error .  "Es wurde kein Nachname angegeben. <br>";
		}
		//Vor- und Nachname prüfen ende
		
		//E-Mail prüfen
		if (!empty($email)) {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = $error . "Die angegebene E-Mail Adresse ist ungültig.<br>";
			}
		} else {
			$error = $error . "Bitte E-mail Adresse angeben. <br>";
		}
		//E-Mail prüfen ende
		
		//Wenn kein Error vorliegt, Daten in der Datenbank updaten.
		if($error){
			echo $error;
		} else {
			$query = "UPDATE tb_user SET firstname = ?, lastname= ?, email= ? WHERE username='$username'";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("sss", $firstname, $lastname, $email);
			$stmt->execute();
		}
		
		
	}

?>