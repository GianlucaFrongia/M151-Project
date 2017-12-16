<?php

define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__.'/modul/session.php');
start_session();
set_session('1', '1', true, '1');
if($_SESSION['user']['loggedIn'] == true){
	echo '1';
	header('Location: dashboard.php');
} elseif($_SESSION['user']['id'] == ''){
	echo '2';
	header('Location: login/register.php');
} else{
	echo '3';
	header('Location: login/login.php');
}
	
	//TODO--> Überprüfen ob bereits eingeloggt (session aktiv), wenn ja weiterleitung nach Dashboard, wenn nein --> login.php call

?>