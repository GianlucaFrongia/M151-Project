<?php

	//Datenbankverbindung einfügen
    include("./../../database/database.php");
	
	if($_POST["toDo"] == "sendMail"){
		
		$username = $_POST['username'];
		
		if (empty($username)) {
			$error = $error . "Es wurde kein Benutzername angegeben.<br/>";
		}
		
		$stmt = $mysqli->prepare("SELECT id, email FROM tb_user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result=$stmt->get_result();
		
		if ($result->num_rows) {
			
			$row = $result->fetch_assoc();
			
			function generateRandomToken($length = 36) {
				$characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomString;
			}
			
			function generateRandomCode($length = 6) {
				$characters = '123456789';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomString;
			}
			
			$code = generateRandomCode();
			$token = generateRandomToken();
			$userid = $row['id'];
			$email = $row['email'];
			
			$stmt = $mysqli->prepare("INSERT INTO tb_changpasstoken(code, token, user_id) VALUES (?, ?, ?);");
			$stmt->bind_param("ssi", $code, $token, $userid);
			$stmt->execute();		
			
			
			$subject = 'FUC - Passwort zurücksetzen';
			$message = 'Hallo, jemand hat gerade versucht dein Passwort zurückzusetzen. Hier ist der Code:' . $code;
			$header = 'From: noreply@test.com' . "\r\n" .
				'Reply-To: noreply@test.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			
			mail($email, $subject, $message, $header);
			
			
		} else {
			echo "Benutzername nicht gefunden";
		}
		
	}
	
	if($_POST["toDo"] == "checkCode"){
		
		$code = $_POST['code'];
		
		$stmt = $mysqli->prepare("SELECT token FROM tb_changpasstoken WHERE code = ?;");
		$stmt->bind_param("i", $code);
		$stmt->execute();
        $result=$stmt->get_result();
		
		if ($result->num_rows) {
			
			$row = $result->fetch_assoc();
			echo $row['token'];
			
		} else {
			echo "Code ist ungültig.";
		}
		
	}


	if($_POST["toDo"] == "resetPass"){
		
		$token = $_POST['token'];
		$code = $_POST['code'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$error = "";
		
		if(!$token || !$code){
			$error = $error . "Fehler im Token/Code System";
		}
		
		//Werte trimmen und auf Richtigkeit prüfen
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		//Passwörter prüfen (auf Länge, Inhalt und Gleichheit), und möglicherweise Fehlermeldung ausgeben
		test_input($password);
		test_input($password2);
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
			
			$stmt = $mysqli->prepare("SELECT user_id FROM tb_changpasstoken WHERE code = ? AND token = ?");
			$stmt->bind_param("ss", $code, $token);
			$stmt->execute();
			$result=$stmt->get_result();
			
			if ($result->num_rows == 1) {
			
				$row = $result->fetch_assoc();
				$userid = $row['user_id'];
				
				//Salt generieren
				$bytes = random_bytes(22);
				$options = [
					'cost' => 11,
					'salt' => $bytes
				];
		
				//Passwort verschlüsseln
				$passwordhash = password_hash($password, PASSWORD_BCRYPT, $options);
				
				//Neues Passwort in der Datenbank updaten.
				$query = "UPDATE tb_user SET password = ? WHERE id= ?";
				$stmt = $mysqli->prepare($query);
				$stmt->bind_param("ss", $passwordhash, $userid);
				$stmt->execute();
				
				$query = "DELETE FROM `tb_changpasstoken` WHERE user_id = ?";
				$stmt = $mysqli->prepare($query);
				$stmt->bind_param("s", $userid);
				$stmt->execute();
				
			} else {
				echo $result->num_rows;
				echo "Es konnte keine Passwort-Ändern Anfrage gefunden werden.";
			}
		}
		
	}
?>
