<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/database/database.php');	
require_once(__ROOT__.'/modul/session.php');
        $error = false;
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username)) {
            echo "Bitte Benutzername eingeben";
            $error = true;
        }
        if (empty($password)) {
            echo "Bitte Password eingeben";
            $error = true;
        }

        if ($error) {
			  echo "1";
        } else {
            $query = "SELECT id , username, password FROM users WHERE username = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result=$stmt->get_result();
            if ($result->num_rows) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    start_session();
						  set_session($row['id'], $row['username'], true, time());
						  // 10 Sekunden schlafen
							sleep(5);
						  echo "ok";
                } else {
                    echo "Falsches Password oder Benutzername";
                }
            } else {
					echo "Benutzername existiert nicht!";

				}
            $mysqli->close();
        }
