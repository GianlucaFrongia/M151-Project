<?php

	if(isset($_GET['token']) && isset($_GET['code'])){
		$atts = ' token="'. $_GET['token'] .'" code="'. $_GET['code'] .'" ';
	} else {
		
	}

?>
<p>Geben Sie hier ein neues Passwort ein:</p>
<div class="row">
	<div class="col-lg-12">
		<label for="fusername" class="sr-only"><b>Neues Passwort</b></label>
		<input type="password" id="changePassPass" name="changePassPass" class="form-control" placeholder="Passwort" required autofocus><br/>
		<label for="fusername" class="sr-only"><b>Passwort wiederholen</b></label>
		<input type="password" id="changePassPass2" name="changePassPass2" class="form-control" placeholder="Passwort wiederholen" required><br/>
		<button <?php echo $atts; ?> class="btn btn-lg btn-primary btn-block" name="changePassPassButton" id="changePassPassButton" type="submit">Bestätigen</button>
	</div>			
</div>
	