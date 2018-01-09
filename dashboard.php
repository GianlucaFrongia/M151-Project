<!-- v1.1 -->
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Fitness Under Control ist deine Lösung den Papierkram endlich loszuwerden.
Wir bieten eine Lösung welche dir die Möglichkeit gibt deine Trainingspläne online zu verwalten. Du kannst eigene Übungen erfassen, eigene Pläne erstellen und Pläne anderer User verwenden.">
		<meta name="author" content="Elia Reutlinger">

		<title>F.U.C - Fitness Under Control</title>
		<link rel="apple-touch-icon" sizes="180x180" href="img/ico/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/ico/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/ico/favicon-16x16.png">
		<link rel="manifest" href="img/ico/manifest.json">
		<link rel="mask-icon" href="img/ico/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="img/ico/favicon.ico">
		<meta name="msapplication-config" content="img/ico/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">

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

	<body id="page-top">
		<div class="loadScreen dashloader">
			<img class="img-responsive" alt="loading" id="loadingImg" src="img/loading.gif"/><span class="helper dashboardLoad"></span>
		</div>
		<?php

			//Navigation einfügen und session aktualisieren
			include("modul/session.php");
			include("modul/navi.php");

		?>
		<div class="container-fluid p-0">
			<section class="resume-section p-3 p-lg-5 d-flex d-column" id="section">
				<div id="pageContent" tab="<?php if(isset($_GET["tab"]) && $_GET["tab"] == "editProfile"){ echo "editProfile"; } else { echo "";} ?>" class="col-lg-12"></div>
			</section>
		</div>

		<!-- Bootstrap core JavaScript -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

		<!-- Plugin JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!-- Custom scripts for this template -->
		<script src="js/resume.min.js"></script>
		<script src="js/dashboard.js"></script>
	</body>
</html>
