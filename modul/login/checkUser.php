<?php
	
	//Datenbankverbindung einfügen
    include("./../../database/database.php");

    //Werte trimmen und auf richtigkeit prüfen
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
	//Variabeln auslesen und initialisieren
    $error = "";
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

	//Username prüfen
    if (empty($username)) {
        $error = $error . "Es wurde kein Benutzername angegeben.<br/>";
    }
    
	//Passwort prüfen
    if (empty($password)) {
         $error = $error . "Es wurde kein Passwort angegeben.<br/>";
    }

	//Wenn kein Error vorliegt, Passwort&Benutzername in der Datenbank zum Vergleich abfragen
    if ($error) {
		
		echo $error;
		
    } else {
                
		//Benutzerinfo aus der Datenbank lesen
        $stmt = $mysqli->prepare("SELECT id, username, password FROM tb_user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result=$stmt->get_result();
        
		//Wenn das Resultat nicht leer ist, soll das Passwort geprüft werden, ansonsten ein Error zurückgegeben werden
        if ($result->num_rows) {

            $row = $result->fetch_assoc();
			
			//Wenn das Passwort stimmt soll eine Session gestartet werden, ansonsten Errormeldung ausgeben
            if (password_verify($password, $row['password'])) {
                
                session_start();
				//Oft vorkommende Werte in der Session abspeichern
				$_SESSION = array('login' => true,'user'  => array('username'  => $row['username'], 'id' => $row['id']));
                
            } else {
                $error = $error . "Das angegebene Password ist falsch.<br/>";
			}
			
        } else {
            $error = $error . "Benutzername existiert nicht!<br/>";
        }
		
		//Falls nun ein Error existiert, diesen zurückgeben
        if($error){echo $error;}
        
    }

?>