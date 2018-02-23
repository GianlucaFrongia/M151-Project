<?php

	$_db_host = getenv('APP_DB_HOST');
	$_db_database = getenv('APP_DB_NAME');
	$_db_username = getenv('APP_DB_USER');
	$_db_passwort = getenv('APP_DB_PASS');


	//Verbindung herstellen
    $mysqli = mysqli_connect($_db_host, $_db_username, $_db_passwort, $_db_database);

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	/* return name of current default database */
	if ($result = $mysqli->query("SELECT DATABASE()")) {
	    $row = $result->fetch_row();
	    printf("Default database is %s.\n", $row[0]);
	    $result->close();
	}

	//Verbindung prüfen
    if (!$mysqli) {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    } else {
		$mysqli->set_charset('utf8');
	}

?>
