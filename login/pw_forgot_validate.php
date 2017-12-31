<?php 
    define('__ROOT__', dirname(dirname(__FILE__)));
	 require_once(__ROOT__.'/database/database.php'); 
	 
	 $error = true;
	 $username = $_POST["username"];
  $password = $_POST["password"];
	 $password2 = $_POST["password2"];

	 function test_input($data)
	 {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	 }

	 if (!empty($username)) {
		$query = "SELECT username FROM users WHERE username = ?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result=$stmt->get_result();
		if ($result->num_rows) {
			 $row = $result->fetch_assoc();
			 } else { 
				echo "Benutzername existiert nicht <br>";
				$error = false;
			 }

  } else {
		echo "Bitte Benutzername eingeben <br>";
		$error = false;
  }

	 test_input($password);
	 test_input($password2);
	 
	 if (!empty($password)) {
		  if (strlen($_POST["password"]) <= '8') {
				echo "Dein Passwort muss mind. 8 Zeichen lang sein <br>";
				$error = false;
		  } elseif (!preg_match("#[0-9]+#", $password)) {
				echo "Dein Passwort muss mind. eine Nummer enthalten <br>";
				$error = false;
		  } elseif (!preg_match("#[A-Z]+#", $password)) {
				echo "Dein Passwort muss mind. einen Grossbuchstaben enthalten <br>";
				$error = false;
		  }
	 }

	 if (empty($password)) {
		  echo "Bitte dein Passwort eingeben<br>";
		  $error = false;
	 }
	 if (empty($password2)) {
		  echo "Bitte dein zweiten Passwort eingeben<br>";
		  $error = false;
	 }
	 
	 if ($password !== $password2) {
		  echo "Die Passwörter stimmen nicht überein<br>";
		  $error = false;
	 }

	 if (!$error) {
	} else {
	 echo "ok";
		 $bytes = random_bytes(22);
		 $options = [
			'cost' => 11,
			'salt' => $bytes
		  ];
	  
		 $hash = password_hash($password, PASSWORD_BCRYPT, $options);
		 $query = "UPDATE users SET password = ? WHERE username = ?";

		 $stmt = $mysqli->prepare($query);
		 $stmt->bind_param("ss", $hash ,$username);
		 $stmt->execute();
		 $mysqli->close();
		 
	}

