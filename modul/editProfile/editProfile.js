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
	
	//Da diese Funktion noch nicht eingebaut ist, soll eine Fehlermeldung angezeigt werden.
	$("#changePassButton").click(function(){
		
		$("#errorCatch").html("Diese Funktion wurde noch nicht implementiert.");
		$("#errorCatch").slideDown("slow").delay("3000").slideUp("slow");
		
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