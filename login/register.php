	<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">

				<form name="register" class="form-signin" action="user.php" method="post">

					<h2 class="form-signin-heading">Registrieren</h2>

					<br/>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" class="form-control" placeholder="Benutzername" autofocus>
					</div>
					
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="form-control" placeholder="password">
					</div>

					<div class="form-group">
						<label for="password2">Password 2</label>
						<input type="password" id="password2" name="password2" class="form-control" placeholder="password2">
					</div>

					<div class="form-group">
						<label for="weight">Email</label>
						<input type="email" id="email" name="email" class="form-control" placeholder="email">
					</div>

					<div class="form-group">
						<label for="weight">Weight</label>
						<input type="text" id="weight" name="weight" class="form-control" placeholder="weight">
					</div>

					<div class="form-group">
						<label for="height">Height</label>
						<input type="text" id="height" name="height" class="form-control" placeholder="height">
					</div>

					<div class="form-group">
						<label for="height">Age</label>
						<input type="text" id="age" name="age" class="form-control" placeholder="age">
					</div>


				<div class="form-check form-check-inline">
					<label class="form-check-label">
					  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1"> Male
					</label>
				 </div>
				 <div class="form-check form-check-inline">
					<label class="form-check-label">
					  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="0"> Female
					</label>
				 </div>

					<div class="row">
						<div class="col-lg-6">
							<button class="btn btn-lg btn-primary" name="register" type="submit" value="register">Register</button>
						</div>
					</div>

				</form>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
	<!-- /container -->