<?php

  function Redirect($url, $permanent = false)
	{
			header('Location: ' . $url, true, $permanent ? 301 : 302);
	
			exit();
	}
	
	if (1==1){
		Redirect('./dashboard/dashboard.php', false);
	} else {
		Redirect('./login/login.php', false);
	}
	

?>