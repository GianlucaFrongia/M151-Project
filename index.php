<?php

define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__.'/modul/session.php');
start_session();

if($_SESSION['user']['loggedIn'] == true){
	header('Location: dashboard.php');
} elseif($_SESSION['user']['id'] == ''){
	header('Location: login/register.php');
} else{
	header('Location: login/login.php');
}	
	//TODO--> Überprüfen ob bereits eingeloggt (session aktiv), wenn ja weiterleitung nach Dashboard, wenn nein --> login.php call

?>
