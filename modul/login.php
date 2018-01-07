<form class="form-signin" name="login-form" id="login-form" method="post">
						
	<h2 class="form-signin-heading">Login</h2>
	<br/>
						
	<label for="fusername" class="sr-only">Benutzername</label>
	<input type="text" id="fusername" name="username" class="form-control" placeholder="Benutzername" required autofocus><br/>
						
	<label for="fpassword" class="sr-only">Passwort</label>
	<input type="password" id="fpassword" name="password" class="form-control" placeholder="Passwort" required><br/>
						
	<div class="row">
		<div class="col-lg-6">
			<button class="btn btn-lg btn-primary btn-block" name="login" id="login">Login</button><br/>
		</div>
		<div class="col-lg-6">
			<a id="gotoRegister" class="btn btn-lg btn-primary btn-block">Registrieren</a>
		</div>
	</div>
						
</form>
					
<p><a id="gotoPassword" href="#">Passwort vergessen</a>?</p>
				
<script src="modul/login/login.js"></script>
    