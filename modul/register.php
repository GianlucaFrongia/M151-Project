<form class="form-register" name="register-form" id="register-form" method="post">
						
	<h2 class="form-signin-heading">Registrieren</h2>
	<br/>
						
	<label for="fusername">Benutzername</label>
	<input type="text" id="fusername" name="fusername" class="form-control" placeholder="maxmustermann" autofocus required>
    <br/>
	
	<label for="ffirstname">Vorname</label>
	<input type="text" id="ffirstname" name="ffirstname" class="form-control" placeholder="Max" required>
    <br/>
	
	<label for="flastname">Nachname</label>
	<input type="text" id="flastname" name="flastname" class="form-control" placeholder="Mustermann" required>
    <br/>
            
    <label for="fpassword">Passwort</label>
	<input type="password" id="fpassword" name="fpassword" class="form-control" placeholder="12345678" required>
    <br/>
            
    <label for="fpassword2">Passwort wiederholen</label>
	<input type="password" id="fpassword2" name="fpassword2" class="form-control" placeholder="12345678" required>
    <br/>
            
    <label for="femail">E-mail</label>
	<input type="email" id="femail" name="femail" class="form-control" placeholder="max@gmail.com" required>
    <br/>
            
			
    <div class="row">
		<div class="col-lg-12">
			<br/><button class="btn btn-lg btn-primary btn-block" name="register" id="register" type="submit">Registrieren</button>
		</div>			
	</div>
						
</form>
					
<p>Oder doch <a id="gotoLogin" href="index.php">Einloggen</a>?</p>

<script src="modul/register/register.js"></script>
        
				
    