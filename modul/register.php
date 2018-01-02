		<form class="form-register" name="register-form" id="register-form" method="post">
						
			<h2 class="form-signin-heading">Registrieren</h2>

			<br/>
						
			<label for="username">Benutzername</label>
			<input type="text" id="username" name="username" class="form-control" placeholder="maxmustermann" autofocus required>
            <br/>
            
            <label for="password">Passwort</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="12345678" required>
            <br/>
            
            <label for="password2">Passwort wiederholen</label>
			<input type="password" id="password2" name="password2" class="form-control" placeholder="12345678" required>
            <br/>
            
            <label for="weight">E-mail</label>
			<input type="email" id="email" name="email" class="form-control" placeholder="max@gmail.com" required>
            <br/>
            
            <label for="weight">Aktuelles Gewicht</label>
			<input type="text" id="weight" name="weight" class="form-control" placeholder="85.3" required>
            <br/>
            
            <label for="height">Grösse</label>
			<input type="text" id="height" name="height" class="form-control" placeholder="180" required>
            <br/>
            
            <label for="height">Alter</label>
            <input type="text" id="age" name="age" class="form-control" placeholder="18+" required>
			<br/>
            
            <label for="gender">Geschlecht </label><br/>
            <div class="form-check form-check-inline">
				<label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1"> Männlich
				</label>
			</div>
			<div class="form-check form-check-inline">
				<label class="form-check-label">
					<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="0"> Weiblich
				</label>
			</div>			
			
            <div class="row">
				<div class="col-lg-12">
					<br/><button class="btn btn-lg btn-primary btn-block" name="register" id="register" type="submit">Registrieren</button>
				</div>			
			</div>
						
		</form>
					
		<p>Oder doch <a id="gotoLogin" href="index.php">Einloggen</a>?</p>
        
        <script src="modul/register/register.js"></script>
        
				
    