$(document).ready(function(){
		
		//Bei der Eingabe eines Wertes soll der Rest des Formulars ausgeklappt werden
		$(".toggleInput").on("keyup", function(){
			
			if($(".toggleInput").val().length >= 1){
				$("#exerciseFormContent").slideDown("slow");
			}
			
		});
		
		//Beim Klick auf den "Übung hinzufügen" Button wird ein Ajax-Call ausgeführt
		$("#addExerciseButton").click(function(){
			
			//Werte auslesen und Variabeln/Arrays initialisieren
			var muscles = new Array();
			var description = $("#fdescription").val();
			var name = $("#fname").val();
			var error = "";
			
			//Jeden "Checked" Muskel in den Array eintragen
			$(".muscles").each(function(){
				
				if($(this).is(':checked')){
					muscles.push($(this).attr("value"));
				}
			
			});
			
			//Überprüfen ob ein Muskel angegeben wurde
			if(muscles.length < 1){
				error = error + "Es wurden keine Muskelgruppen gewählt.<br/>";
			}
			
			//Überprüfen ob eine Beschreibung angegeben wurde
			if(description == ""){
				error = error + "Es wurde keine Beschreibung angegeben.<br/>";
			}
			
			//Überprüfen ob ein Name angegeben wurde
			if(name == ""){
				error = error + "Es wurde kein Name angegeben.<br/>";
			}
			
			//Wenn kein Error vorhanden ist, soll ein Ajax-Call ausgeführt werden
			if(error){
				
				$("#error").html(error).fadeTo("slow", 1);
				
			} else {
				
				$.ajax({
					method: "POST",
					url: "./modul/exercise/modifyExercise.php",
					data: {toDo: "addExercise",muscles:muscles, description:description, name:name},
					success: function(data){
						if(data){
							//Errormeldung anzeigen
							$("#error").html(data).fadeTo("slow", 1);
						} else {
							//Formular wieder leeren und schliessen
							$("#fdescription").val("");
							$("#fname").val("");
							$(".muscles").each(function(){
								$(this).prop( "checked", false );
							});
							$("#exerciseFormContent").slideUp("slow");
							
							//Erfolgsmeldung anzeigen und Seite neu laden (Damit die neue Übung korrekt in der Liste erscheint)
							$("#success").html("Übung wurde hinzugefügt!").fadeTo("slow", 1).delay(1000).fadeTo("slow", 0,function(){
								$("#pageContent").load("modul/exercise.php");	
							});
						}
					}
				});
				
			}
		});
	
		//Beim Klick auf einen Titel bzw. Kopf einer Übung in der Liste, sollen Details erscheinen oder verschwinden
		$(".headInfo").each(function(){
			redoheader(this);
		});
		
		//Funktion, welche spezifische Details einblendet oder ausblendet
		function redoheader(obj){
			
			$(obj).click(function(){
				
				//Inhalt aller Detail-Container überprüfen, um richtigen zu öffnen
				var id = $(obj).attr("exerciseID");
				$(".detailed").each(function(){
					if($(this).attr("exerciseID") == id){
						$(this).toggle("slow");  
					}    
				});
				
			});
		}
	
		//Buttons neu initialisieren, damit ein neu hinzugefügter Muskel in einer Bestehenden Übung auch gleich wieder gelöscht werden könnte.
		function redoButton(){
			
			$(".deleteButton").each(function(){
			
				$(this).click(function(){
					
					//Variabeln auslesen
					var exercise = $(this).attr("exerciseID");
					var muscleID = $(this).attr("muscleID");
					
					//Auf Variabeln prüfen, um den richtigen Eintrag zu entfernen
					$(".muscleGroup").each(function(){
						if($(this).attr("exerciseID") == exercise && $(this).attr("muscleID") == muscleID){
							
							var muscleEntity = $(this);
							
							//Eintrag in der Datenbank entfernen
							$.ajax({
								method: "POST",
								url: "./modul/exercise/modifyExercise.php",
								data: {toDo: "deleteMuscle",exercise:exercise, muscleID: muscleID},
								success: function(data){
									if(data){
										$("#error").html(data).fadeTo("slow", 1);
									} else {
										muscleEntity.slideUp("slow");
									}
								} 
							}); 
						}    
					});
				
				});
			
			});
		}
		//Funktion beim öffnen der Seite einmal ausführen
		redoButton();
		
		//Beim drücken auf das + Symbol einen neuen Muskel in der Liste eintragen
		$(".addButton").each(function(){ 
		
			$(this).click(function(){
				
				//Übung auslesen
				var exercise = $(this).attr("exerciseID");
				 
				$(".muscleSelect").each(function(){
					
					//Bei jedem Dropdown überprüfen ob es in der richtigen Übung ist
					if($(this).attr("exerciseID") == exercise){
						
						//Den richtigen Muskel auslesen
						var muscleID = $('option:selected', this).attr("value");
						var muscleName = $('option:selected', this).html();
						var muscleEntity = $(this);
						
						//Den Muskel in der Liste eintragen und Ajax-Call ausführen
						$(".musclesListed").each(function(){
							
							//Prüfen, ob es die richtige Liste ist
							if($(this).attr("exerciseID") == exercise && muscleID){
							
								//Muskel eintragen
								$(this).append('<div style="display: none;" exerciseID="' + exercise + '" muscleID="'+ muscleID +'" class="muscleGroup newTrue"><i style="cursor: pointer;" exerciseID="' + exercise + '" muscleID="'+ muscleID +'" class="fa fa-times-circle deleteButton" aria-hidden="true"></i> '+ muscleName +' <br/></div>');
								$(".newTrue").each(function(){
									$(this).slideDown("slow");
								});
								
								//Löschen-Knopf initialisieren (alle Knöpfe werden neu initialisiert)
								redoButton();
								
								//Änderung in der Datenbank speichern
								$.ajax({
									method: "POST",
									url: "./modul/exercise/modifyExercise.php",
									data: {toDo: "addMuscle",exercise:exercise, muscleID: muscleID},
									success: function(data){
										if(data){
											//Error anzeigen
											$("#error").html(data).fadeTo("slow", 1);
										} else {
											//Dropdown leeren
											muscleEntity.val("");
										}
									}
								}); 
								
							}    
						
						});
						
					}
				
				});
			
			});
			
		});
	
		//Beim drücken auf den "Übung löschen" Knopf soll eine Meldung ausgegeben werden, beim bestätigen dieser soll die Übung gelöscht werden
		$(".deleteExerciseButton").each(function(){
			
			$(this).click(function(){
				
				//Übungs ID auslesen
				var exercise = $(this).attr("exerciseID");
				
				//Auf dem Knopf eine Warnung anzeigen
				$(this).html("Die Übung wird aus allen Plänen gelöscht. Fortfahren?");
				$(this).css("background-color", "red");
				
				//Beim erneuten betätigen die Übung löschen
				$(this).click(function(){
					
					//Löschung in der Datenbank
					$.ajax({
						method: "POST",
						url: "./modul/exercise/modifyExercise.php",
						data: {toDo: "deleteExercise",exercise:exercise},
						success: function(data){
							if(data){
								//Errormeldung ausgeben
								$("#error").html(data).fadeTo("slow", 1);
							} else {
								//Übung in der Liste ausblenden
								$(".userExercise").each(function(){
									if($(this).attr("exerciseID") == exercise){
										$(this).slideUp("slow",function(){
											$(this).remove();	
										});
									}
								});
							}
						}
					});
				
				}); 
			
			});
		
		});
	
		//Bei einer änderung der Beschreibung einer vorhandenen Übung, soll ein "Speichern" Knopf erscheinen
		$(".fListdescription").each(function(){
			
			$(this).on("keyup", function(){
				
				//Übungs ID auslesen
				var exerciseID = $(this).attr("exerciseID");
				
				$(".savebutton").each(function(){
					
					//Richtige Übung wählen
					if($(this).attr("exerciseID") == exerciseID){
						
						//Den Speichern Button anzeigen und das Textfeld anpassen (Zur besseren Optik)
						$(this).slideDown("slow");
						$(".fListdescription").each(function(){
							if($(this).attr("exerciseID") == exerciseID){
								$(this).animate({height:"50%"},200);
							}
						});
							
					}    
				
				});
				
			});
			
		});
	
		//Beim betätigen des "Speichern" Buttons sollen die Änderungen in die Datenbank geschrieben werden
		$(".savebutton").each(function(){
			
			$(this).click(function(){
				
				//Übungs ID auslesen und Variabeln initialisieren
				var exerciseID = $(this).attr("exerciseID");
				var newDescription = "";
				var buttonEntity = $(this);
				
				//Die neue Beschreibung bei der richtigen Übung auslesen
				$(".fListdescription").each(function(){
					if($(this).attr("exerciseID") == exerciseID){
						newDescription = $(this).val();
					}
				});
				
				//Falls die Beschreibung nicht leer ist, soll der Wert gespeichert werden
				if(newDescription != ""){
					
					//Wert in der Datenbank updaten
					$.ajax({
						method: "POST",
						url: "./modul/exercise/modifyExercise.php",
						data: {toDo: "changeDescription",exerciseID:exerciseID, newDescription:newDescription},
						success: function(data){
							if(data){
								//Error-Meldung anzeigen
								$("#error").html(data).fadeTo("slow", 1);
							} else {
								//Button-Erfolgsmeldung anzeigen und ausblenden
								$("a", buttonEntity).html("Änderungen gespeichert!").delay(1000).slideUp("slow", function(){
									
									//Textfeldgrösse wieder normalisieren
									$(".fListdescription").each(function(){
										if($(this).attr("exerciseID") == exerciseID){
											$(this).animate({height:"70%"},200);
										}
									});
											  
								});
							}
						}
					});
					
				} else {
					//TODO Fehlermeldung implementieren
				}
				
			});
			
		});	
    
});