$(document).ready(function(){
    
	//Erste Übung im Formular anzeigen
    $("#exercise").slideDown("slow");
    
	//Bei der Eingabe eines Wertes soll der Rest des Formulars ausgeklappt werden
	$(".toggleInput").on("keyup", function(){
		if($(".toggleInput").val().length >= 1){
			$("#planFormContent").slideDown("slow");
		}
	});
	
	//Eine weitere Übung im Formular eintragen
    $(".addExerciseForm").click(function(){
		
		//Das letzte Übungsformular Klonen und zuunters an die Liste mit allen Übungen anhängen
        $('.allExercise').children().last().clone().slideUp("fast", function(){
            $(this).appendTo(".allExercise").slideDown("slow", function(){
				
				//Dem geklonten Übungsformular eine neue ID zuweisen
                var newID = parseInt($(this).attr("exerciseListID"));
                newID = newID + 1;
                $(this).attr("exerciseListID", newID);
                
				//Werte des geklonten auf Leer setzen
                $(".sets", this).val("");
                $(".reps", this).val("");
                        
            });
            
        });

    });
    
	//Das letzte Übungsformular löschen
    $(".deleteExerciseForm").click(function(){
        
		//Das letzte Übungsformular auswählen und ausblenden
        if($(".allExercise").children().last().attr("exerciseListID") != "1"){
            $(".allExercise").children().last().slideUp("slow", function(){
				//Objekt komplett löschen
                $(this).remove();
            });
        }
        
    });
    
	//Beim klicken auf den Button "Plan hinzufügen" soll der Plan in der Datenbank gespeichert werden
    $("#addNewPlan").click(function(){
        
		//Variabeln initialisieren bzw. auslesen
        var planName = $("#fplanName").val();
        var planDescription= $("#fplanDescription").val();
        var listExercise, listSets, listReps;
        var exercises = new Array();
        var error = "";
        var i = 1;
		
		//Anzahl der eingetragenen Übungen definieren/auslesen
        var countExercises = parseInt($('.allExercise').children().last().attr("exerciseListID"));
        
		//Jede Übung soll im Array exercises eingetragen werden
        do {
            
            $(".exercise").each(function(){
                
				//Die richtige Übung auswählen
                if(parseInt($(this).attr("exerciseListID")) == i){
					
					//Variabeln auslesen
                    listExercise = $(".exerciseSelect", this).val();
                    listSets = $(".sets", this).val();
                    listReps = $(".reps", this).val();
                    
					//Wenn keine Wiederholungen angegeben sind, den Wert auf 1 setzen
                    if(!listSets){
                        listSets = "1";
                    }
                    
					//Array aus den ausgelesenen Variabeln erstellen
                    var all =  [listExercise, listReps, listSets];
                    
					//Wenn alle Angaben ausgefüllt sind, den Array "all" an den "exercises" Array anfügen
                    if(listSets > 0 && listExercise){
                        exercises.push(all);
                    }

                }
            
            });
            
			//i hochzählen
            i = i + 1;
        
        } while (countExercises >= i);
        
		//Prüfen ob eine Übung angegeben wurde
        if(exercises.length < 1){
            error = error + "Es muss mindestens eine Übung hinzugefügt werden. <br/>";
        } 
        
		//Prüfen ob ein Planname angegeben wurde
        if(!planName){
            error = error + "Es wurde kein Name angegeben. <br/>";
        }
        
		//Prüfen ob eine Planbeschreibung angegeben wurde
        if(!planDescription){
            error = error + "Es wurde keine Beschreibung angegeben. <br/>";
        }
        
		//Wenn kein Error besteht, Plan in der Datenbank speichern, ansonsten Meldung ausgeben
        if(error){
            $("#error").html(error).slideDown("slow");
        } else {
			
			//Mögliche Errormeldung ausblenden
            $("#error").html(error).slideUp("slow");
			
			//Daten an .php zur Servervalidierung und Speicherung senden
            $.ajax({
                method: "POST",
                url: "./modul/userPlan/modifyPlan.php",
                data: {toDo: "addPlan",planName:planName, planDescription:planDescription, exercises:exercises},
                success: function(data){
					
                    if(data){
						//Mögliche Errormeldung ausgeben
                        $("#error").html(data).fadeTo("slow", 1);
                    } else {
						
						//Formularfelder leeren
                        $("#fplanName").val("");
                        $("#fplanDescription").val("");
						
						//Übungsformulare leeren und entfernen
                        $('.allExercise').children().each(function(){
                            
                            $(".exerciseSelect", this).val("");
                            $(".sets", this).val("");
                            $(".reps", this).val("");
                            
                            if(parseInt($(this).attr("exerciseListID")) != 1){
                                $(this).slideUp("slow", function(){
                                    $(this).remove();
                                });
                            }

                        });
						
						//Formular zuklappen
						$("#planFormContent").slideUp("slow");
						
						//Erfolgsmeldung anzeigen und Seite neu laden, damit der Plan korrekt in der Liste erscheint
						$("#success").html("Übung wurde hinzugefügt!").fadeTo("slow", 1).delay(1000).fadeTo("slow", 0,function(){
							$("#pageContent").load("modul/userPlan.php");	
						});
						
                    }
					
                }
            });
			
        }
    
    });
    
	//Beim Klick auf einen Titel bzw. Kopf eines Plans in der Liste, sollen Details erscheinen oder verschwinden
    $(".headInfo").each(function(){
        
        $(this).click(function(){
            
			//Inhalt aller Detail-Container überprüfen, um richtigen zu öffnen
            var id = $(this).attr("planID");
            $(".detailed").each(function(){
                if($(this).attr("planID") == id){
                    $(this).toggle("slow");  
                }    
            });
        
        });
    
    });
    
	//Bei einer änderung eines Inputs eines vorhandenen Plans, soll ein "Speichern" Knopf erscheinen
    $(".fListdescription").each(function(){

        $(this).on("keyup", function(){
            
			//Plan ID auslesen
            var planID = $(this).attr("planID");
            
			//Richtigen Button einblenden
            $(".saveChangesButton").each(function(){
                if($(this).attr("planID") == planID){
                    $(this).slideDown("slow");
                }    
            });
            
        });
        
    });

	//Beim Klicken auf den "Änderungen Speichern" Button sollen die änderungen in die Datenbank geschrieben werden
    $(".saveChangesButton").each(function(){
        
        $(this).click(function(){
            
			//Variabeln auslesen bzw. initialisieren
            var planID = $(this).attr("planID");
            var newDescription = "";
            var countExercises = 0;
			var listExercise, listSets, listReps;
            var newExercises = new Array();
            var error = "";
            var i = 1;
			var buttonEntity = $(this);
            
			//Die richtige Beschreibung suchen und in Variabel speichern
            $(".planDescription").each(function(){
                if($(this).attr("planID") == planID){
                    newDescription = $(this).val();
                }
            });
            
            //Übungen im richtigen Formular durchzählen
            $('.plansExercises').each(function(){
                if($(this).attr("planID") == planID){
                    countExercises = parseInt($(".listExercise", this).last().attr("listId"));
                }
            });
               
            //Alle Inhalte der Inputs in den einzelnen Übungen in den Array "newExercises" schreiben
            do {
                
                $(".listExercise").each(function(){

					//Richtige Übung auslesen
                    if(parseInt($(this).attr("listId")) == i && $(this).attr("planID") == planID){
                        
						//Variabeln auslesen
                        planhasexID = $(this).attr("planhasexID");
                        listSets = $(".listSets", this).val();
                        listReps = $(".listReps", this).val();
                        
						//Wenn Wiederholungen Leer ist, Wert auf 1 setzen
                        if(!listSets){
                            listSets = "1";
                        }
                        
						//Werte in einen Array schreiben
                        var all =  [planhasexID, listReps, listSets];
                        
						//Wenn alle Werte vorhanden sind, Array "all" an den "newExercises" Array anhängen
                        if(listSets > 0 && listReps > 0 && planhasexID){
                            newExercises.push(all);
                        }
    
                    }
                
                });
                
				//i hochzählen
                i = i + 1;
            
            } while (countExercises >= i);
            
			//Wenn die Beschreibung nicht Leer ist, sollen die Änderungen in der Datenbank gespeichert werden. Ansonsten Fehlermeldung ausgeben
            if(newDescription != ""){
				
                $.ajax({
                    method: "POST",
                    url: "./modul/userPlan/modifyPlan.php",
                    data: {toDo: "changePlan",planID:planID, newDescription:newDescription, newExercises:newExercises},
                    success: function(data){
                        if(data){
							//Mögliche Fehlermeldung ausgeben
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
							//Erfolgsmeldung ausgeben und Button ausblenden
							buttonEntity.html("Änderungen gespeichert!").delay(1000).slideUp("slow");
                        }
                    }
                });
				
            } else {
				//TODO Fehlermeldung implementieren
			}
  
        });
        
    });

	//Beim drücken des "Plan löschen" Buttons, soll der Plan aus der Datenbank gelöscht werden
    $(".deletePlanButton").each(function(){
        
        $(this).click(function(){
            
			//Plan ID auslesen
            var planID = $(this).attr("planID");
            
			//Warnung auf dem Button anzeigen
            $(this).html("Dies kann nicht rückgängig gemacht werden. Fortfahren?");
            $(this).css("background-color", "red");
            
			//Beim bestätigen der Warnung, Plan aus Datenbank löschen
            $(this).click(function(){
                
				//Ajax-Call zur Löschung in der Datenbank
                $.ajax({
                    method: "POST",
                    url: "./modul/userPlan/modifyPlan.php",
                    data: {toDo: "deletePlan", planID:planID},
                    success: function(data){
                        if(data){
							//Mögliche Errormeldung ausgeben
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
							//Plan aus der Liste ausblenden
                            $(".userPlan").each(function(){
                                if($(this).attr("planID") == planID){
                                    $(this).slideUp("slow");
                                }
                            });
                        }
                    }
                });
            
            }); 
        
        });
		
    });

	//Beim Klicken auf den Favoriten-Stern bei einem Plan soll dieser als Favorit gelöscht werden
    $(".favStar").each(function(){
        
        $(this).click(function(){
            
			//Plan ID auslesen und Sternobjekt speichern
            var planID = $(this).attr("planID");
			$starEntity = $(this);
            
			//Ajax-Call zur löschung an die Datenbank senden
            $.ajax({
                method: "POST",
                url: "./modul/publicPlan/editFav.php",
                data: {toDo: "deleteFav", planID:planID},
                success: function(data){
                    if(data){
						//Mögliche Errormeldung ausgeben
                        $("#error").html(data).fadeTo("slow", 1);
                    } else {
						
						//Favoritenstern weiss färben und Attribute auf False setzen
						$starEntity.attr("isfav", "false");    
						$starEntity.removeClass("fa-star").addClass("fa-star-o");
						
						//Den Eintrag aus der Liste ausblenden
						$(".FavPlanListEntry").each(function(){
							if($(this).attr("planID") == planID){
								$(this).slideUp("slow");
							}    
						});
						
                    }
                }
            });
              
        });
		
    });

    

});
