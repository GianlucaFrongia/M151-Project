<?php 
    include("/Applications/XAMPP/xamppfiles/htdocs/M151-Project/database/database.php");
    

    if (isset($_POST['register'])) {
        $error = array();
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
                $error[] = "<li>Der Benutzername is zu lange.</li>";
            } elseif (strlen($username) < 6) {
                $error[] = "<li>Der Benutzername is zu kurz.</li>";
            }
        } else {
            $error[] = "<li>Bitte Benutzername eingeben</li>";
        }

            

        test_input($password);
        test_input($password2);
        
        if (!empty($password)) {
            if (strlen($_POST["password"]) <= '8') {
                $error[] = "<li>Dein Passwort muss mind. 8 Zeichen lang sein </li>";
            } elseif (!preg_match("#[0-9]+#", $password)) {
                $error[] = "<li>Dein Passwort muss mind. eine Nummer enthalten </li>";
            } elseif (!preg_match("#[A-Z]+#", $password)) {
                $error[] = "<li>Dein Passwort muss mind. einen Grossbuchstaben enthalten </li>";
            }
        }
        if (empty($password)) {
            $error[] = "<li>Bitte dein Passwort eingeben</li>";
        }
        if (empty($password2)) {
            $error[] = "<li>Bitte dein zweiten Passwort eingeben</li>";
        }
        
        if ($password !== $password2) {
            $error[] = "<li>Die Passwörter stimmen nicht überein</li>";
        }
        
        test_input($email);
        if (!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "<li>Email address $email is invalid.</li>";
            }
        } else {
            $error[] = "<li>Bitte Email eingeben</li>";
        }



        test_input($weight);
        if (!empty($weight)) {
            if (!is_numeric($weight)) {
                $error[] = "<li>Gewicht darf nur aus Nummer bestehen </li>";
            }
            if ($weight < 0) {
                $error[] = "<li>Gewicht darf keine negative Zahl sein </li>";
            }
        } else {
            $error[] = "<li>Bitte dein Gewicht eintragen</li>";
        }



        test_input($height);
        if (!empty($height)) {
            if (!is_numeric($height)) {
                $error[] = "<li>Grösse darf nur aus Nummer bestehen </li>";
            }
            if ($height < 0) {
                $error[] = "<li>Grösse darf keine negative Zahl sein </li>";
            }
        } else {
            $error[] = "<li>Bitte deine Grösse eintragen</li>";
        }


        test_input($age);
        if (empty($age)) {
            if (!is_numeric($age)) {
                $error[] = "<li>Alter darf nur aus Nummer bestehen </li>";
            }
            if ($age < 0) {
                $error[] = "<li>Alter darf keine negative Zahl sein </li>";
            } elseif ($age > 120) {
                $error[] = "<li>Alter glaub etwas zu alt oder ein Vampir ? </li>";
            }
        }


                
        test_input($gender);
        if (!empty($error)) {
            echo "Fehler beim registrieren.";
            foreach ($error as $errors) {
                echo $errors;
            }
            "Zurück zum <a href='login.php'>Registrierung</a>\n";
        } else {
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
    }




    if (isset($_POST['login'])){
        $error = array();
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username)) {
            $error[] = "<li>Bitte Benutzername eingeben</li>";            
        }
        if (empty($password)) {
            $error[] = "<li>Bitte Password eingeben</li>";            
        }

        if (!empty($error)) {
            echo "Fehler beim Login.";
     
            foreach ($error as $errors) {
                echo $errors;
            }
            "Zurück zum <a href='login.php'>Registrierung</a>\n";
     
        } else {
            $query = "SELECT username, password FROM users WHERE username = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result=$stmt->get_result();
                    if($result->num_rows){
                        $row = $result->fetch_assoc();
                        if(password_verify($password , $row['password'])){
                            header("/dashboard.php");
                            echo "erfolgreich";
                        } else {
                          echo  "Falscher Password";  
                        } 
                    }
            $mysqli->close();
        }
    }        