<?php 
    include("/Applications/XAMPP/xamppfiles/htdocs/M151-Project/includes/database.php");


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $email = $_POST["email"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $error = "";


        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        function isEmtpy($field)
        {
            if (!empty(trim($field))) {
            } else {
                $error .= "Geben Sie bitte $field an.<br />";
            }
		}
		          
        isEmtpy($username);
            
        if (strlen($username) > 30) {
            echo "Der Benutzername is zu lange.<br />";
        } elseif (strlen($username) < 6) {
            echo "Der Benutzername is zu kurz.<br />";
        }
            

        isEmtpy($password);
        isEmtpy($password2);

        if (($password == $password2)) {
            test_input($password);
            test_input($password2);
            if (strlen($_POST["password"]) <= '8') {
                $error = "Your Password Must Contain At Least 8 Characters! \n";
            } elseif (!preg_match("#[0-9]+#", $password)) {
                $error = "Your Password Must Contain At Least 1 Number! \n";
            } elseif (!preg_match("#[A-Z]+#", $password)) {
                $error = "Your Password Must Contain At Least 1 Capital Letter! \n";
            } elseif (!preg_match("#[a-z]+#", $password)) {
                $error = "Your Password Must Contain At Least 1 Lowercase Letter! \n";
            }
        } elseif (!empty($_POST["password"])) {
            $error .= "Pls Enter Password";
        } elseif (!empty($_POST["password2"])) {
            $error .= "Pls Enter Second Password";
        } else {
        }


        isEmtpy($email);
                
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "Email address '$email_a' is invalid.\n";
        }


        isEmtpy($weight);
        if (!is_numeric($weight)) {
            $error .= "Gewicht darf nur aus Nummer bestehen \n";
        } elseif ($weight < 0) {
            $error .= "Gewicht darf keine negative Zahl sein \n";
        } else {
        }


        isEmtpy($height);
        if (!is_numeric($height)) {
            $error .= "Grösse darf nur aus Nummer bestehen \n";
        } elseif ($height < 0) {
            $error .= "Grösse darf keine negative Zahl sein \n";
        } else {
        }


        isEmtpy($age);
        if (!is_numeric($age)) {
            $error .= "Alter darf nur aus Nummer bestehen \n";
        } elseif ($age < 0) {
            $error .= "Alter darf keine negative Zahl sein \n";
        } elseif ($age > 120) {
            $error .= "Bist glaub etwas zu alt oder ein Vampir ? \n";
        } else {
        }

                
        isEmtpy($gender);
                

        /*
                                $handle = array();
                                $email = array();
                                $sql = "SELECT
                                                      username,
                                                      email
                                            FROM
                                                      users
                                          ";
        
                                $result = mysqli_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysqli_error());
                                while($row = mysqli_fetch_assoc($result)){
                                            $username[] = $row['username'];
                                            $email[] = $row['email'];
        
                            }
                            */
        echo $error;
        //}
        function User()
        {
        }
    }
