<?php 
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/database/database.php'); 

        $error = true;
        $username = $_POST["username"];
		$password = $_POST["password"];
        $password2 = $_POST["password2"];
        $email = $_POST["email"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        $age = $_POST["age"];
        $gender = $_POST["gender"] ?? '';

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
                  
        test_input($username);
        if (!empty($username)) {
            if (strlen($username) > 30) {
                echo "Der Benutzername is zu lange. <br>";
                $error = false;
            } elseif (strlen($username) < 6) {
                echo "Der Benutzername is zu kurz. <br>";
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
        
        test_input($email);
        if (!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email address $email is invalid.<br>";
                $error = false;
            }
        } else {
            echo "Bitte Email eingeben<br>";
            $error = false;
        }



        test_input($weight);
        if (!empty($weight)) {
            if (!is_numeric($weight)) {
                echo "Gewicht darf nur aus Nummer bestehen <br>";
                $error = false;
            }
            if ($weight < 0) {
                echo "Gewicht darf keine negative Zahl sein <br>";
                $error = false;
            }
        } else {
            echo "Bitte dein Gewicht eintragen<br>";
            $error = false;
        }



        test_input($height);
        if (!empty($height)) {
            if (!is_numeric($height)) {
                echo "Grösse darf nur aus Nummer bestehen <br>";
                $error = false;
            }
            if ($height < 0) {
                echo "Grösse darf keine negative Zahl sein <br>";
                $error = false;
            }
        } else {
            echo "Bitte deine Grösse eintragen<br>";
            $error = false;
        }


        test_input($age);
        if (empty($age)) {
            if (!is_numeric($age)) {
                echo "Alter darf nur aus Nummer bestehen <br>";
                $error = false;
            }
            if ($age < 0) {
                echo "Alter darf keine negative Zahl sein <br>";
                $error = false;
            } elseif ($age > 120) {
                echo "Alter glaub etwas zu alt oder ein Vampir ? <br>";
                $error = false;
            }
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
            $query = "INSERT INTO users(username, password, weight, height, geschlecht, age, email) VALUES (?,?,?,?,?,?,?)";

            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ssddiis", $username, $hash, $weight, $height, $gender, $age, $email);
            $stmt->execute();
            $mysqli->close();
            
        }

