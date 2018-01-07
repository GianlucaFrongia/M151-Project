<?php

	//Variabeln definieren
	$_db_host = "localhost";
	$_db_database = "m151_project";
	$_db_username = "fucuser";
	$_db_passwort = "MdbwbSwtPiCa01:24U";

	//Verbindung herstellen
    $mysqli = mysqli_connect($_db_host, $_db_username, $_db_passwort, $_db_database);
    
	//Verbindung prüfen
    if (!$mysqli) {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }

?>