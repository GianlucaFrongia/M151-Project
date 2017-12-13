    <div class="container">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<br/>
					<img class="img-responsive center-block" src="images/headersmall.png"/>
				
					<form class="form-signin" name="login" action="user.php" method="post">
						
						<h2 class="form-signin-heading">Login</h2>

						<br/>
						
						<label for="inputEmail" class="sr-only">Benutzername</label>
						<input type="text" id="username" name="username" class="form-control" placeholder="Benutzername" required autofocus><br/>
						
						<label for="inputPassword" class="sr-only">Passwort</label>
						<input type="password" id="password" name="password" class="form-control" placeholder="Passwort" required><br/>
						
						<div class="row">
							<div class="col-lg-6">
								<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
							</div>
							<div class="col-lg-6">
								<button class="btn btn-lg btn-primary btn-block" type="register">Register</button>
							</div>
						</div>
						
					</form>
					<p><br/>Forgot your <a href="#">Password</a>?</p>
				</div>
				<div class="col-lg-4"></div>
			</div>
    </div> <!-- /container -->


  </body>
</html>
