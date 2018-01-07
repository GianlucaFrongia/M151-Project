$(document).ready(function(){
	
	//Mögliche Errormeldungen ausblenden
	$("#error").fadeTo("slow", 0);
	
	//Beim Klicken des "Registrieren" Buttons soll das Formular geladen werden
	$("#gotoRegister").click(function (event) {
		
		//Normales Buttonevent verhindern, Seite ausblenden
		event.preventDefault();
		$("#pageContent").fadeOut("fast", function(){
			
			//Ladegrafik einblenden und seite laden
			$('.loadScreen').fadeTo("fast", 1);
			$("#pageContent").load("modul/register.php", function(){
				
				//Ladegrafik ausblenden und seite anzeigen
				$('.loadScreen').fadeTo("fast", 0, function(){
					$("#pageContent").fadeIn("fast");  
				});
				
			});
			
		});
		
	});
	
	//Beim Klicken auf "Passwort vergessen" soll eine Errormeldung ausgegeben werden, da diese Fuktion noch nicht implementiert ist
	$("#gotoPassword").click(function (event) {
		
		//Normales Buttonevent verhindern, Seite ausblenden
		event.preventDefault();
		$("#pageContent").fadeOut("fast", function(){
			
			//Ladegrafik einblenden und seite laden
			$('.loadScreen').fadeTo("fast", 1);
			$("#pageContent").load("modul/changePass.php", function(){
				
				//Ladegrafik ausblenden und seite anzeigen
				$('.loadScreen').fadeTo("fast", 0, function(){
					$("#pageContent").fadeIn("fast");  
				});
				
			});
			
		});
	
	});
	
	//Beim klicken auf "Login" soll der User eingeloggt werden
	$("#login").click(function(event){
		
		//Normales Buttonevent verhindern, mögliche Errormeldung ausblenden
		event.preventDefault();
		$("#error").fadeTo("fast", 0, function(){
			
			//Variabeln initialisieren und auslesen
			var error = "";
			var username = $("#fusername").val();
			var password = $("#fpassword").val();
		
			//Benutzername prüfen
			if(username.length < 6){
				if (username.length == 0){
					error = error + "Es wurde kein Benutzername angegeben.<br/>";
				} else {
					error = error + "Benutzername muss aus mindestens 6 Zeichen bestehen. <br/>";
				}
			}
			
			//Passwort prüfen
			if(password.length < 8){
				if (password.length == 0){
					error = error + "Es wurde kein Passwort angegeben.<br/>";
				} else {
					error = error + "Passwort muss aus mindestens 8 Zeichen bestehen. <br/>";
				}
			}
			
			//Wenn kein Error besteht, Ajax-Call ausführen, ansonsten Error anzeigen
			if(error){
				$("#error").html(error).fadeTo("slow", 1);
			} else {
				
				//Ajax-Call zur Serverüberprüfung und Datenbankabfrage
				$.ajax({
					method: "POST",
					url: "./modul/login/checkUser.php",
					data: {username:username, password:password},
					success: function(data){
						
						if(data){
							//Falls ein Error zurückgegeben wird diesen anzeigen
							$("#error").html(data).fadeTo("slow", 1);
						} else {
							
							//Erfolgsmeldung anzeigen und Seite ausblenden
							$("#pageContent").fadeOut("fast", function(){
								
								$("#pageContent").html('<div class="alert alert-success"><strong>Erfolgreich </strong>eingeloggt!</div>');
								$("#pageContent").fadeIn("slow").delay(500).fadeOut("slow", function(){
									$("body").fadeOut("slow", function(){
										//Dashboard laden
										window.location.replace("dashboard.php");
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