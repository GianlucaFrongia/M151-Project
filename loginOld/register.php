
	<!DOCTYPE html>
<html lang="en">

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>F.U.C - Fitness Under Control</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/devicons/1.8.0/css/devicons.min.css" integrity="sha256-8q59ya5uaZ4zEEKRqeFvQUIKZODah+FZ3Qey+wWSvso=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" integrity="sha256-7O1DfUu4pybYI7uAATw34eDrgQaWGOfMV/8erfDQz/Q=" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
	<div class="container">
		<div id="error">

		</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">

				<form id="register-form" name="register-form" class="form-signin" method="post">

					<h2 class="form-signin-heading">Registrieren</h2>

					<br/>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" class="form-control" placeholder="Benutzername" autofocus required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="form-control" placeholder="password" required>
					</div>

					<div class="form-group">
						<label for="password2">Password 2</label>
						<input type="password" id="password2" name="password2" class="form-control" placeholder="password2" required>
					</div>

					<div class="form-group">
						<label for="weight">Email</label>
						<input type="email" id="email" name="email" class="form-control" placeholder="email" required>
					</div>

					<div class="form-group">
						<label for="weight">Weight</label>
						<input type="text" id="weight" name="weight" class="form-control" placeholder="weight" required>
					</div>

					<div class="form-group">
						<label for="height">Height</label>
						<input type="text" id="height" name="height" class="form-control" placeholder="height" required>
					</div>

					<div class="form-group">
						<label for="height">Age</label>
						<input type="text" id="age" name="age" class="form-control" placeholder="age" required>
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
							<button class="btn btn-lg btn-primary" name="register_btn" id="register_btn" type="submit" value="register">Register</button>
						</div>
						<div class="col-lg-6">
						<button class="btn btn-lg btn-secondary" onclick="location.href='http://localhost/m151-project/login/login.php';" value="login">Login</button>

						</div>

					</div>

				</form>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="js/register.js"></script>
  </body>

</html>

	<!-- /container -->