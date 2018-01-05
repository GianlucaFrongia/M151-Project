<?php

    include("./../../database/database.php");

    $error = "";
    $username = $_POST["username"];
	$password = $_POST["password"];
    $password2 = $_POST["password2"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

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

    //Benutzername prüfen
    test_input($username);
    if (!empty($username)) {
      $sql ="SELECT username FROM tb_user where username = '$username'";
    	$result = $mysqli->query($sql);
      if($result->num_rows > 0){
        $error = $error . "Username bereits vorhanden!";
      }
        elseif (strlen($username) > 30) {
            $error = $error . "Der Benutzername is zu lang (Max. 30 Zeichen). <br>";
        }
        elseif (strlen($username) < 6) {
            $error = $error .  "Der Benutzername is zu kurz (Min 6 Zeichen). <br>";
        }
    } else {
        $error = $error .  "Es wurde kein Benutzername angegeben. <br>";
    }
    //Benutzername prüfen ende

    //Passwörter prüfen
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
        $error = $error . "Bitte dein zweiten Passwort eingeben<br>";
    }

    if ($password !== $password2) {
        $error = $error . "Die Passwörter stimmen nicht überein<br>";
    }
    //Passwörter prüfen ende

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


    if ($error) {
        echo $error;
    } else {
        $bytes = random_bytes(22);
        $options = [
            'cost' => 11,
            'salt' => $bytes
        ];

        $passwordhash = password_hash($password, PASSWORD_BCRYPT, $options);
        $query = "INSERT INTO tb_user(username, password, email, firstname, lastname) VALUES (?,?,?,?,?)";

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssss", $username, $passwordhash, $email, $firstname, $lastname);
        $stmt->execute();
        $mysqli->close();

    }

?>
