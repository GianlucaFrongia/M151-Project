<?php
	
	//Session starten & ID erneuern
	session_start();
	session_regenerate_id();
	
	//Prüfen, ob der User bereits eingeloggt ist. Falls ja, User an dashboard.php weiterleiten
	if(isset($_SESSION['user'])){
		header('Location: dashboard.php');
	} 

?>

<!DOCTYPE html>
<html>
	<head>
    
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Elia Reutlinger, Valentino Rusconi, Gianluca Frongia">

		<title>F.U.C - Login/Register</title>

		<!-- Bootstrap core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">

	</head>
	<body style="display: none;">
		
		<div class="loadScreen">
			<span class="helper"></span><img alt="loading" class="img-responsive" id="loadingImg" src="img/loading.gif"/>
		</div>
		
		<div class="container">
			
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<br/>
					<img class="img-fluid mx-auto d-block" alt="logo" src="img/logo500.png"/>
					<div id="error" class="alert alert-danger" style="opacity: 0; min-height: 55px;"></div>
					<div id="pageContent" style="display: none;">
          
					</div>
				</div>
				<div class="col-lg-3"></div>
			</div>
			
		</div> <!-- /container -->
	 
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="js/index.js"></script>
  
	</body>

</html>
