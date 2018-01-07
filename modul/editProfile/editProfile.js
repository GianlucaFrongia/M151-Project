$(document).ready(function(){

	//Hochlade-Formular bei Klick auf Button anzeigen
	$("#changePic").click(function(){
		
		$("#picUploader").fadeIn("slow");
		
	});
	
	//Bei einer Änderung innerhalb eines Inputs soll der "Speichern" knopf angezeigt werden.
	$(".change").each(function(){
		
		//Die Änderung gleich im Titel der Seite anzeigen
		if($(this).attr("id") == "Ffirstname"){
			$(this).keyup(function(){
				$("#usersName").html($(this).val());
			});
		}
		
		//Button anzeigen
		$(this).keydown(function(){
			$("#saveChangesButton").slideDown("slow");
		});
		
	});
	
	//Bei einem Klick auf den "Bild löschen" Button, soll ein Ajax-Call ausgeführt werden
	$("#deletePic").click(function(){
		
		$.ajax({
			method: "POST",
			url: "./modul/editProfile/editEntry.php",
			data: {toDo:"deletePic"},
			success: function(data){
				if(data){
					//Errormeldung anzeigen
					$("#errorCatch").html(data);
					$("#errorCatch").slideDown("slow").delay("3000").slideUp("slow");
				} else {
					//Profilbild ausblenden und Seite neu laden (damit es auch aus dem Navi verschwindet)
					$("#profPic").slideUp("slow", function(){
						window.location.replace("dashboard.php?tab=editProfile");
					});
				}
			}
		});
		
	});
	
	//Formular anzeigen wenn der Button gedrückt wird
	$("#changePassButton").click(function(){
		
		$(this).slideUp("slow");
		$('.changePassForm').slideDown("slow");
			
	});
	
	//Button triggern
	$("#newPassButton").click(function(){
		
		//Variabeln auslesen bzw. initialisieren
		var password = $("#FnewPass").val();
		var password2 = $("#FnewPass2").val();
		var error = "";
		
		//Variabeln zur Überprüfung definieren
		var upperCase = new RegExp("[A-Z]");
		var lowerCase = new RegExp("[a-z]");
		var numbers = new RegExp("[0-9]");
			
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
		
		//Wenn kein Error ausgegeben wird, neue Passwörter Serverseitig prüfen und in die Datenbank schreiben
		if (error) {
			$("#errorCatch").html(error).slideDown("slow", 1);
		} else {
			
			$("#errorCatch").slideUp("slow", 0);
			$.ajax({
				method: "POST",
				url: "./modul/editProfile/editEntry.php",
				data: {toDo:"changePass", password: password, password2: password2},
				success: function(data) {
					if (data) {
						//Falls Daten zurückgegeben werden, Meldung ausgeben
						$("#errorCatch").html(data).slideDown("slow", 1);
					} else {
						//Wenn die Änderung erfolgreich war, Erfolgsmeldung zurückgeben
						$("#changePassButton").html("Passwort geändert!").css("background-color", "#0b9c00").slideDown("slow");
						$('.changePassForm').slideUp("slow");
						
						
					}
				}
			});
			
		}
	
	});
	
	//Bei einem Klick auf den "Änderungen Speichern" Button wird ein Ajax-Call ausgeführt
	$("#saveChangesButton").click(function(){
		
		//Inhalte auslesen
		var firstname = $("#Ffirstname").val();
		var lastname = $("#Flastname").val();
		var email = $("#Femail").val();
		
		//Inhalte zur Änderung abschicken
		$.ajax({
			method: "POST",
			url: "./modul/editProfile/editEntry.php",
			data: {toDo:"saveChanges", firstname:firstname, lastname:lastname, email:email},
			success: function(data){
				if(data){
					//Error ausgeben
					$("#errorCatch").html(data);
					$("#errorCatch").slideDown("slow").delay("3000").slideUp("slow");
				} else {
					//Button ändern und ausblenden
					$("#saveChangesButton").html("Änderungen gespeichert!");
					$("#saveChangesButton").delay(1000).slideUp("slow", function(){
						$("#saveChangesButton").html("Änderungen speichern");
					});
				}
			}
		});
		
	});

});