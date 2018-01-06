<?php
	
	//Session laden
    include("session.php");
	
	//Sessionvariabeln durch Funktion leeren
    session_unset();
	
	//Sessionvariabeln manuell Leeren (zur Sicherheit)
    $_SESSION['user'] = "";
	
	//Session zerstören
    session_destroy();
	
	//Per JS-Script zum index(Login) weiterleiten
    echo "<script type='text/javascript'>window.location.replace('index.php');</script>";

?>