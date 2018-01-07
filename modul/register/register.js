$(document).ready(function(){
	
	//Mögliche Errormeldung ausblenden
	$("#error").fadeTo("slow", 0);

	//Zur Login-Seite wechseln
	function goToLogin(event) {
		
		//Normales Buttonevent verhindern, Seite ausblenden
		event.preventDefault();
		$("#pageContent").fadeOut("fast", function() {
			
			//Ladegrafik einblenden, Seite laden
			$(".loadScreen").fadeTo("fast", 1);
			$("#pageContent").load("modul/login.php", function() {
				
				//Ladegrafik ausblenden, Seite anzeigen
				$(".loadScreen").fadeTo("fast", 0, function() {
					$("#pageContent").fadeIn("fast");
				});
				
			});
			
		});
		
	}
	
	//Beim Klicken auf den "Einloggen" Link Seite wechseln
	$("#gotoLogin").click(function() {
		goToLogin();
	});
	
	//Beim klicken des "Registrieren"-Buttons soll der User registriert werden
	$("#register").click(function(event) {
		
		//Normales Buttonevent verhindern
		event.preventDefault();
		
		//Mögliche Errormeldung ausblenden
		$("#error").fadeTo("fast", 0, function() {
			
			//Variabeln initialisieren bzw. auslesen
			var error = "";
	
			var username = $("#fusername").val();
			var password = $("#fpassword").val();
			var password2 = $("#fpassword2").val();
			var firstname = $("#ffirstname").val();
			var lastname = $("#flastname").val();
			var email = $("#femail").val();
			
			//Variabeln zur Überprüfung definieren
			var upperCase = new RegExp("[A-Z]");
			var lowerCase = new RegExp("[a-z]");
			var numbers = new RegExp("[0-9]");
			var emailAt = new RegExp("[@]");
			var emailDot = new RegExp("[.]");
	
			//Benutzernamen prüfen (auf länge), oder Errormeldung zurückgeben
			if (username.length > 30) {
				error = error + "Der Benutzername ist zu lang (Max. 30 Zeichen).<br/>";
			} else {
				if (username.length < 6) {
					if (username.length == 0) {
						error = error + "Es wurde kein Benutzername angegeben.<br/>";
					} else {
						error = error + "Der Benutzername ist zu kurz (Min. 6 Zeichen).<br/>";
					}
				}
			}
			//Benutzernamen prüfen ende
	
			//Passwörter püfen (auf Länge, Inhalt und Gleichheit), oder Errormeldung zurückgeben
			if (password.length < 8) {
				if (password.length == 0) {
					error = error + "Es wurde kein Passwort angegeben.<br/>";
				} else {
					error = error + "Das Passwort muss mindestens 8 Zeichen enthalten.<br/>";
				}
			} else {
				if (password.match(upperCase) == null || password.match(lowerCase) == null || password.match(numbers) == null) {
					error = error + "Das Passwort muss aus Gross- sowie Kleinbuchstaben, Zahlen und Sonderzeichen bestehen.<br/>";
				} else {
					if (password !== password2) {
						error = error + "Die beiden Passwörter stimmen nicht überein. </br>";
					}
				}
			}
			//Passwörter prüfen ende
	
			//Vor- und Nachname prüfen (auf länge), oder Errormeldung zurückgeben
			if (firstname.length > 30) {
				error = error + "Der Vorname ist zu lang (Max. 30 Zeichen).<br/>";
			} else {
				if (firstname.length < 2) {
					if (firstname.length == 0) {
						error = error + "Es wurde kein Vorname angegeben.<br/>";
					} else {
						error = error + "Der Vorname ist zu kurz (Min. 2 Zeichen).<br/>";
					}
				}
			}
			
			if (lastname.length > 30) {
				error = error + "Der Nachname ist zu lang (Max. 30 Zeichen).<br/>";
			} else {
				if (lastname.length < 2) {
					if (lastname.length == 0) {
						error = error + "Es wurde kein Nachname angegeben.<br/>";
					} else {
						error = error + "Der Nachname ist zu kurz (Min. 2 Zeichen).<br/>";
					}
				}
			}
			//Vor- und Nachname prüfen ende
	
			//E-Mail überprüfen (auf Länge und Inhalt), oder Errormeldung zurückgeben
			if (email.length > 50) {
				error = error + "Die E-Mail Adresse ist zu lang (Max. 50 Zeichen).<br/>";
			} else {
				if (email.length == 0) {
					error = error + "Es wurde keine E-Mail Adresse angegeben.<br/>";
				} else {
					if (email.match(emailAt) == null || email.match(emailDot) == null) {
						error = error + "Die angegebene E-Mail Adresse ist ungültig.<br/>";
					}
				}
			}
			//E-Mail überprüfen ende
	
			//Anfrage an Server schicken wenn kein Error besteht, ansonsten Errormeldung ausgeben
			if (error) {
				$("#error").html(error).fadeTo("slow", 1);
			} else {
				
				//Daten zur Serverüberprüfung an .php senden und möglicherweise User registrieren
				$.ajax({
					method: "POST",
					url: "./modul/register/registerUser.php",
					data: {username: username, password: password, password2: password2, firstname: firstname, lastname: lastname, email: email },
					success: function(data) {
						if (data) {
							//Falls Daten zurückgegeben werden, Meldung ausgeben
							$("#error").html(data).fadeTo("slow", 1);
						} else {
							//Wenn Registrierung erfolgreich, Seite ausblenden und Erfolgsnachricht einblenden.
							$("#pageContent").fadeOut("slow", function() {
								$("#pageContent").html('<div class="alert alert-success"><strong>Registriert!</strong> Sie können sich nun mit dem Benutzernamen "' + username + '" einloggen.</div>');
								$("#pageContent").fadeIn("slow").delay(500).fadeOut("slow", function(){
									
									$(".loadScreen").fadeTo("fast", 1);
									$("#pageContent").load("modul/login.php", function() {
										
										//Ladegrafik ausblenden, Seite anzeigen, Benutzername-Feld füllen
										$(".loadScreen").fadeTo("fast", 0, function() {
											$("#fusername").val(username);
											$("#pageContent").fadeIn("fast");
										});
										
									});
									
								});
							});
						}
					}
				});
				
			}
			
		});
	});
	
});
