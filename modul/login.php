
					
		<form class="form-signin" name="login-form" id="login-form" method="post">
						
			<h2 class="form-signin-heading">Login</h2>

			<br/>
						
			<label for="inputEmail" class="sr-only">Benutzername</label>
			<input type="text" id="username" name="username" class="form-control" placeholder="Benutzername" required autofocus><br/>
						
			<label for="inputPassword" class="sr-only">Passwort</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Passwort" required><br/>
						
			<div class="row">
				<div class="col-lg-6">
					<button class="btn btn-lg btn-primary btn-block" name="login" id="login" type="submit">Login</button></br>
				</div>
							
				<div class="col-lg-6">
					<a id="gotoRegister" class="btn btn-lg btn-primary btn-block">Registrieren</a>
				</div>
			</div>
						
		</form>
					
		<p><br/><a href="pw_forgot.php">Passwort vergessen</a>?</p>
				
        <script src="modul/login/login.js"></script>
    