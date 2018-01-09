<?php

    //CREATE USER 'fucuser'@'localhost' IDENTIFIED VIA mysql_native_password USING 'MdbwbSwtPiCa01:24U';GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO 'fucuser'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
	//Variabeln definieren
	$_db_host = process.env.db_host;
	$_db_database = process.env.db_database;
	$_db_username = process.env.db_username;
	$_db_passwort = process.env.db_password;

	//Verbindung herstellen
    $mysqli = mysqli_connect($_db_host, $_db_username, $_db_passwort, $_db_database);

	//Verbindung prüfen
    if (!$mysqli) {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }

?>
