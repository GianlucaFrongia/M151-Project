<?php
	$_db_host = "localhost";
	$_db_datenbank = "befit";
	$_db_username = "";
	$_db_passwort = "";

    $db = mysqli_connect($_db_host , $_db_datenbank, $_db_username, $_db_passwort);
    
    if (!$db) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    
    
    mysqli_close($db);

?>