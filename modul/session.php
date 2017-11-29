<?php

	session_start();
	session_regenerate_id();
 
	if (empty($_SESSION['login'])) {
		
		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/login/login.php');
		
	} else {

		$name = htmlspecialchars($_SESSION['user']['username']);
		$users_id = htmlspecialchars($_SESSION['user']['userid']);

	}
?>