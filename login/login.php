<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/devicons/1.8.0/css/devicons.min.css" integrity="sha256-8q59ya5uaZ4zEEKRqeFvQUIKZODah+FZ3Qey+wWSvso=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" integrity="sha256-7O1DfUu4pybYI7uAATw34eDrgQaWGOfMV/8erfDQz/Q=" crossorigin="anonymous" />

		<!-- Custom Css --> 
		<link href="css/login.css" rel="stylesheet">

  </head>
	<body>
		
	<?php
		
	?>

    <div class="container">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<br/>
					<img class="img-responsive center-block" src="images/headersmall.png"/>
				
					<form class="form-signin" action="./login.php" method="post">
						
						<h2 class="form-signin-heading">Login</h2>

						<br/>
						
						<label for="inputEmail" class="sr-only">Benutzername</label>
						<input type="text" id="username" name="f[username]" class="form-control" placeholder="Benutzername" required autofocus><br/>
						
						<label for="inputPassword" class="sr-only">Passwort</label>
						<input type="password" id="password" name="f[password]" class="form-control" placeholder="Passwort" required><br/>
						
						<div class="row">
							<div class="col-lg-6">
								<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
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
