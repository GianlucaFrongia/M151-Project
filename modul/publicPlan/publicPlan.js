$(document).ready(function(){
    
	//Beim Klick auf einen Titel bzw. Kopf eines Plans in der Liste, sollen Details erscheinen oder verschwinden
    $(".headInfo").each(function(){
        
        $(this).click(function(){
            
			//Plan ID auslesen
            var id = $(this).attr("planID");
            $(".detailed").each(function(){
				//Anhand der ID beim richtigen Plan details einblenden
                if($(this).attr("planID") == id){
                    $(this).toggle("slow");  
                }    
            });
            
        });
    
    });
    
	//Beim Klicken auf den Favoriten-Stern bei einem Plan soll dieser als Favorit gespeichert oder gelöscht werden
    $(".favStar").each(function(){
        
        $(this).click(function(){
			
			//Plan ID auslesen und Sternobjekt speichern
            var planID = $(this).attr("planID");
            $starEntity = $(this);
			
			//Wenn die Attribute false ist, ist die Übung noch kein Favorit, ansonsten schon
            if($(this).attr("isfav") == "false"){
				
				//Favorit in der Datenbank speichern
                $.ajax({
                    method: "POST",
                    url: "./modul/publicPlan/editFav.php",
                    data: {toDo: "addFav", planID:planID},
                    success: function(data){
                        if(data){
							//Möglichen Error ausgeben
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
							//Favoriten-Stern gelb färben und Attribute auf True setzen
                            $starEntity.removeClass("fa-star-o").addClass("fa-star");
							$starEntity.attr("isfav", "true");
                        }
                    }
                });
                
            } else {
				
				//Favorit in der Datenbank löschen
                $.ajax({
                    method: "POST",
                    url: "./modul/publicPlan/editFav.php",
                    data: {toDo: "deleteFav", planID:planID},
                    success: function(data){
                        if(data){
							//Möglichen Error ausgeben
                            $("#error").html(data).fadeTo("slow", 1);
                        } else {
							//Favoriten-Stern weiss färben und Attribute auf False setzen
							$starEntity.removeClass("fa-star").addClass("fa-star-o");
							$starEntity.attr("isfav", "false");
                        }
                    }
                });
                
            }    
        });     
    });

});