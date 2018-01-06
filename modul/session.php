<?php
    
	//Prüfen, ob die Session bereits gestartet wurde, ansonsten Session starten
    if(!isset($_SESSION['user'])){
        session_start();
    }
    
	//Session-ID erneuern
    session_regenerate_id();
    
	//Prüfen ob der User eingeloggt ist (Eine Session gefüllt ist). Wenn ja Benutzername und ID in Variabel speichern, ansonsten User auf Login umleiten
    if(isset($_SESSION['user']['username'])){
		//Globale Variabeln auslesen
        $username = $_SESSION['user']['username'];
        $userid = $_SESSION['user']['id'];
    } else {
		//Umleitung auf login
        header("Location: ./index.php");
        exit();
    }
    
?>