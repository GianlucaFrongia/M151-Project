<?php

	if(isset($_GET['token']) && isset($_GET['code'])){
		$token = $_GET['token'];
		$code = $_GET['code'];
		$step = 'changePassword" token="'.$token.'" code="'.$code;
	}

?>
<h2 class="form-signin-heading">Passwort ändern</h2>
<br/>
						
<div step="<?php echo $step; ?>"  id="changePassContent">
	
</div>

<script src="modul/changePass/changePass.js"></script>