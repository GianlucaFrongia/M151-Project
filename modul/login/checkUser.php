<?php

    include("./../../database/database.php");

    $error = "";
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)) {
        $error = $error . "Es wurde kein Benutzername angegeben.<br/>";
    }
        
    if (empty($password)) {
         $error = $error . "Es wurde kein Passwort angegeben.<br/>";
    }

    if ($error) {
		echo $error;
    } else {
                
        $stmt = $mysqli->prepare("SELECT id , username, password FROM tb_user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        
        $result=$stmt->get_result();
        
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                
                session_start();
				$_SESSION = array('login' => true,'user'  => array('username'  => $row['username'], 'id' => $row['id']));
                
            } else {
                $error = $error . "Das angegebene Password ist falsch.<br/>";
            }
        } else {
            $error = $error . "Benutzername existiert nicht!<br/>";
        }
            
        $mysqli->close();
        echo $error;
        
    }

?>