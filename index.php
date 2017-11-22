<?php

  function Redirect($url, $permanent = false)
	{
			header('Location: ' . $url, true, $permanent ? 301 : 302);
	
			exit();
	}
	
	if (!empty($_SESSION['login'])){
		Redirect('./dashboard/dashboard.php', false);
	} else {
		Redirect('./login/login.php', false);
	}
	

?>